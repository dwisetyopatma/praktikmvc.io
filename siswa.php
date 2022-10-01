<?php
require('Form.php');
require('ModelSiswa.php');
class siswa{
    var $nis;
    var $nama;
    var $tahun;
    var $kota;
    
    //function __construct(){
    //    $this->nis="K4131";
    //    $this->nama="Kamu";
    //    $this->tahun="2005";
    //    $this->kota="Bogor";
    //    $this->CetakData();
    // }

    function IsiData($nis,$nama,$tahun,$kota){
        $this->nis=$nis;
        $this->nama=$nama;
        $this->tahun=$tahun;
        $this->kota=$kota;
    }

    public function CetakData(){
        $txt="----------------------------------------------</br>";
        $txt.="NIS Siswa ".$this->nis."</br>";
        $txt.="Nama Siswa ".$this->nama."</br>";
        $txt.="Tahun Lahir Siswa ".$this->tahun."</br>";
        $txt.="Kota Asal Siswa ".$this->kota."</br>";
        $txt.="Umur Siswa ".$this->HitungUmur()."</br>";
        $txt="----------------------------------------------</br>";
        require('TampilData.php');
    }

    protected function HitungUmur(){      
        $umur=date('Y') - $this->tahun;
        return $umur;
    }

public function InputForm(){
    $FormSiswa=new Form('','Input Siswa');
    $FormSiswa->AddField('nis','NIS Siswa');
    $FormSiswa->AddField('nama','Nama Siswa');
    $FormSiswa->AddField('tahun','Tahun Lahir Siswa');
    $FormSiswa->AddField('kota','Kota Asal Siswa');
    if(isset($_POST['tombol'])){
        $data=$FormSiswa->GetData();
        $this->nis=$data[0];
        $this->nama=$data[1];
        $this->tahun=$data[2];
        $this->kota=$data[3];
        $this->CetakData();

        require ('Koneksi.php');
        $modelssw=new ModelSiswa();
        $sql=$modelssw->InsertSIswa($this);
        if($conn->query($sql)===TRUE){
            echo "Data berhasil masuk";
        } else {
            echo "error".$sql."</br>".$conn->error;
        }
    } else {
              $Cetak=$FormSiswa->DisplayForm();
              require('TampilForm.php');
           }
     // else {
     //    $FormSiswa->DisplayForm();
    // }
  }
}
?>