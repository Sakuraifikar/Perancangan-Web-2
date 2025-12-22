<?php
require_once __DIR__ . '/vendor/autoload.php';
include 'koneksi.php';

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4',
    'orientation' => 'P',
    'margin_top' => 30,
    'margin_bottom' => 20
]);

// HEADER
$mpdf->SetHTMLHeader('
<table width="100%" style="border-bottom:1px solid #000;">
<tr>
    <td width="20%"><b>DATA FOTO SISWA</b></td>
    <td width="60%" align="center">Laporan PDF</td>
    <td width="20%" align="right">' . date('d-m-Y') . '</td>
</tr>
</table>
');

// FOOTER
$mpdf->SetHTMLFooter('
<table width="100%" style="border-top:1px solid #000;font-size:10px;">
<tr>
    <td>Dicetak: ' . date('d-m-Y H:i') . '</td>
    <td align="center">Halaman {PAGENO}/{nbpg}</td>
    <td align="right">&copy; ' . date('Y') . '</td>
</tr>
</table>
');

// CSS
$css = '
body { font-family: Arial; font-size: 11px; }
table { width:100%; border-collapse: collapse; margin-top:10px; }
th { background:#4CAF50; color:#fff; padding:8px; border:1px solid #333; }
td { padding:8px; border:1px solid #ccc; text-align:center; }
img { height:80px; }
';

// QUERY (SAMA DENGAN index.php)
$data = mysqli_query($koneksi, "SELECT * FROM namasiswa ORDER BY id ASC");

$html = '<h3 align="center">DATA FOTO SISWA</h3>';
$html .= '<table>
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Foto</th>
</tr>';

while ($d = mysqli_fetch_assoc($data)) {

    $fotoPath = 'gambar/' . $d['foto'];
    if (!file_exists($fotoPath)) {
        $fotoPath = '';
    }

    $html .= "
    <tr>
        <td>{$d['id']}</td>
        <td>{$d['nama']}</td>
        <td>
            <img src='$fotoPath'>
        </td>
    </tr>";
}

$html .= '</table>';

$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->Output('Data_Foto_Siswa.pdf', 'I');
