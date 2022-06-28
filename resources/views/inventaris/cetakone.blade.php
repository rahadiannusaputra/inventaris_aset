<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
    body {
        font-size: 18px;
        font-family: Arial, Helvetica, sans-serif;
    }

    th {
        text-align: start;
    }

    .page-break {
        page-break-after: always;
    }

</style>

<body>
    <table class="center" border="1" cellpadding="0" cellspacing="0">
        <tr>
            <td><img src="assets/logo.png" alt="" srcset="" style="width: 150px"></td>
            <td>{!! DNS2D::getBarcodeHTML(route('detaildata', $inventaris->kode_barang), 'QRCODE', 4, 4) !!}</td>
        </tr>
    </table>
</body>

</html>
