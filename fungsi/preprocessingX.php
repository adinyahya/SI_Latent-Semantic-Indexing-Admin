 <?php
function preproses($teks) {
	include "koneksi.php";
	//include_once 'IDNstemmer.php';
//	require_once ('stemming.php');
	$teks = str_replace("'", " ", $teks);
	$teks = str_replace("-", " ", $teks);
	$teks = str_replace(")", " ", $teks);
	$teks = str_replace("(", " ", $teks);
	$teks = str_replace("\"", " ", $teks);
	$teks = str_replace("/", " ", $teks);
	$teks = str_replace("=", " ", $teks);
	$teks = str_replace(".", " ", $teks);
	$teks = str_replace(",", " ", $teks);
	$teks = str_replace(":", " ", $teks);
	$teks = str_replace(";", " ", $teks);
	$teks = str_replace("!", " ", $teks);
	$teks = str_replace("?", " ", $teks);
	$teks = str_replace("–", " ", $teks);
	$teks = str_replace("<", " ", $teks);
	$teks = str_replace(">", " ", $teks);
	
	$teks = strtolower(trim($teks));
	
	$restem = mysqli_query($con, "SELECT * FROM tbstem ORDER BY Id");

	while($rowstem = mysqli_fetch_array($restem)) {  			
  		$teks = str_replace($rowstem['Term'], $rowstem['Stem'], $teks);
  	}			 	
			

    $astoplist = array ("yang", "apapun", "antara", "juga", "rupa", "terhadap", "dari", "kami", "kamu", "ini", "sedang", "itu", "itulah", "jika", "akan", "karena", "atau", "dan", "tersebut", "pada", "dengan", "adalah", "yaitu", "mereka", "dapat", "untuk", "oleh", "lakukan", "aku", "bagaimana", "dalam");				

	foreach ($astoplist as $i => $value) {
   	$teks = str_replace($astoplist[$i], " ", $teks);
	}

	//kembalikan teks yang telah dipreproses	
	$teks = strtolower(trim($teks));
	return $teks;
} 

function buatindex() {
	include "koneksi.php";
		//hapus index sebelumnya
		mysqli_query($con, "TRUNCATE TABLE tbindex");

		//ambil semua berita (teks)		
		$resBerita = mysqli_query($con, "SELECT * FROM tbberita ORDER BY Id");
		$num_rows = mysqli_num_rows($resBerita);
		echo "<script> alert('Berhasil mengindeks sebanyak " . $num_rows . " berita');</script>";
                    
		while($row = mysqli_fetch_array($resBerita)) {  			
			$docId = $row['Id'];  
			$berita = $row['Berita'];  
  					
  			$berita = preproses($berita);
  			
  			//simpan ke inverted index (tbindex)
  			$aberita = explode(" ", trim($berita));
  			
  			foreach ($aberita as $j => $value) {						
				if ($aberita[$j] != "") {				
			 	
					//berapa baris hasil yang dikembalikan query tersebut?					
					$rescount = mysqli_query($con, "SELECT Count FROM tbindex WHERE Term = '$aberita[$j]' AND DocId = $docId");			
					$num_rows = mysqli_num_rows($rescount);
							
					if ($num_rows > 0) {					
						$rowcount = mysqli_fetch_array($rescount);							
						$count = $rowcount['Count'];
						$count++;
  										
						mysqli_query($con, "UPDATE tbindex SET Count = $count WHERE Term = '$aberita[$j]' AND DocId = $docId");
					} 		
					else {				
						mysqli_query($con, "INSERT INTO tbindex (Term, DocId, Count) VALUES ('$aberita[$j]', $docId, 1)");
					}
				} 
			}		
          } 
         hitungbobot();
}

function hitungbobot() {	
	include "koneksi.php";

	$resn = mysqli_query($con,"SELECT DISTINCT DocId FROM tbindex");
	$jumlahdokumen = mysqli_num_rows($resn);
	
	$resBobot = mysqli_query($con,"SELECT * FROM tbindex ORDER BY Id");
	$num_rows = mysqli_num_rows($resBobot);
	echo "<script> alert('Terdapat " . $num_rows . " Term yang diberikan bobot');</script>";
   
	while($rowbobot = mysqli_fetch_array($resBobot)) {
		
		$term = $rowbobot['Term'];	
		$totF = mysqli_query($con,"SELECT SUM(Count) as A FROM `tbindex` WHERE Term = '$term'");
		$hasF = mysqli_fetch_array($totF);
		$f = $hasF['A'];
		
		$id = $rowbobot['Id'];
		
		//berapa jumlah dokumen yang mengandung term tersebut?, N
		$resNTerm = mysqli_query($con,"SELECT Count(*) as N FROM tbindex WHERE Term = '$term'");
		$rowNTerm = mysqli_fetch_array($resNTerm);
		$df = $rowNTerm['N'];
		
		$w = $f * log10($jumlahdokumen/$df);
		
		$resUpdateBobot = mysqli_query($con,"UPDATE tbindex SET Bobot = $w WHERE Id = $id");		
  	}   
} 

function panjangvektor() {	
	include "koneksi.php";

	mysqli_query($con,"TRUNCATE TABLE tbvektor");
		
	$resDocId = mysqli_query($con,"SELECT DISTINCT DocId FROM tbindex");
	
	$num_rows = mysqli_num_rows($resDocId);
	echo "<script> alert('Terdapat " . $num_rows . " dokumen yang dihitung panjang vektornya');</script>";
     
	while($rowDocId = mysqli_fetch_array($resDocId)) {
		$docId = $rowDocId['DocId'];
		//echo "------------------------".$docId."--------------------------<br>";
		$resVektor = mysqli_query($con,"SELECT Bobot FROM tbindex WHERE DocId = $docId");
		
		//jumlahkan semua bobot kuadrat 
		$panjangVektor = 0;		
		while($rowVektor = mysqli_fetch_array($resVektor)) {
			$panjangVektor = $panjangVektor + $rowVektor['Bobot']  *  $rowVektor['Bobot'];
			//echo $panjangVektor."<br>";
				
		}
		
		//hitung akarnya		
		$panjangVektor = sqrt($panjangVektor);
		//echo "<br>Hasil: ".$panjangVektor;		
		$resInsertVektor = mysqli_query($con,"INSERT INTO tbvektor (DocId, Panjang) VALUES ($docId, $panjangVektor)");	
	} 
} 

function hapusall()
{

			include 'koneksi.php';
			$sql1 = "TRUNCATE TABLE tbberita";
			$sql2 = "TRUNCATE TABLE tbcache";
			$sql3 = "TRUNCATE TABLE tbindex";
			$sql4 = "TRUNCATE TABLE tbvektor";
			$proses = mysqli_query($con,$sql1);
			$proses = mysqli_query($con,$sql2);
			$proses = mysqli_query($con,$sql3);
			$proses = mysqli_query($con,$sql4);

			
 			echo "<script> alert('Data Berhasil Dihapus!!');</script>";
     

}
function hapuscache()
{

			include 'koneksi.php';
			$sql2 = "TRUNCATE TABLE tbcache";
			$proses = mysqli_query($con,$sql2);

			
 			echo "<script> alert('Data Berhasil Dihapus!!');</script>";
     

}
?>