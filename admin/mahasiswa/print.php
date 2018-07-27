<?php include("./../koneksi.php");?>
<!DOCTYPE html><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistem Informasi Desa Kebon Waris">
    <meta name="author" content="KKN-P 2018 Universitas Muhammadiyah Sidoarjo">
    <title>Sistem Informasi Desa Kebon Waris</title>
<style type="text/css">
<!--
.style1 {font-size: 36px}
-->
</style>
</head>

<style>
body {padding:30px}
.print-area {border:1px solid red;padding:1em;margin:0 0 1em}
</style>
<body>
<div id="print-area-1" class="print-area">
<div style="text-align:right;"><a class="no-print" href="javascript:printDiv('print-area-1');">Print</a>&nbsp;&nbsp;<a class="no-print" href="mahasiswa.php">Kembali</a></div>
<th colspan="2" scope="col">
  <div align="center">
    <table width="794" border="0">
      <tr>
         <th scope="col"><h1>Data Mahasiswa</h1></th>
      </tr>
      </table>
</div></th>
<div align="center">
  <table width="819" height="auto" border="1" cellpadding="1" cellspacing="0">
    
    <tr>
      <th width="41" scope="row"><div align="center"><strong>NO</strong></div></th>
      <th width="183" height="32" scope="row"><div align="center"><strong>USERNAME/NIM</strong></div></th>
      <td width="181"><div align="center"><strong>PASSWORD</strong></div></td>
      <td width="280"><div align="center"><strong>NAMA LENGKAP</strong></div></td>
      <td width="142"><div align="center"><strong>PRODI</strong></div></td>
      <td width="200"><div align="center"><strong>NOMER REKENING</strong></div></td>
    </tr>
	<?php $sql = mysqli_query($koneksi, "SELECT * FROM Mahasiswa ORDER BY username ASC");
	  if(mysqli_num_rows($sql) == 0){echo '<tr><td colspan="8">Tidak ada data.</td></tr>';}else{$no = 1;while($row = mysqli_fetch_assoc($sql)){echo '
    <tr>
      <td style="text-align: center;">&nbsp;'.$no.'</td>
	  <td>&nbsp;'.$row['username'].'</td>
	  <td>&nbsp;'.$row['password'].'</td>
	  <td>&nbsp;'.$row['nama_lengkap'].'</td>
	  <td>&nbsp;'.$row['prodi'].'</td>
	  <td>&nbsp;'.$row['no_rekening'].'</span></td>
    </tr>
';$no++;}}?>
  </table>
</div>
<textarea id="printing-css" style="display:none;">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px dotted;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:1.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:1.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:100%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:100%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em;text-align:left;vertical-align:top}th{font-weight:bold}table[border="1"] caption{border:none;font-style:italic}.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
</div>
<script type="text/javascript">
//<![CDATA[
function printDiv(elementId) {
    var a = document.getElementById('printing-css').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}
//]]>
</script>
</body>
</html>

