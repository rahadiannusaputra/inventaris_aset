<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .px-5 {
            padding-left: 5px;
            padding-right: 5px;

        }

        .pr-20 {
            padding-right: 20px;
        }

    </style>
</head>

<body>
    <table>
        <tr>
            <td>
                @foreach ($inventaris as $key => $data)
                    <table class="center pr-20" border="1" cellpadding="0" cellspacing="0">
                        <tr>
                            <td><img src="assets/logo.png" alt="" srcset="" style="width: 150px"></td>
                            <td>{!! DNS2D::getBarcodeHTML(route('detaildata', $data->kode_barang), 'QRCODE', 4, 4) !!}</td>
                        </tr>
                    </table>
                    <br>
                    @if ($key != 0)
                        @if (($key + 1) % 6 == 0)
            </td>
            <td>
                @endif
                @if (($key + 1) % 12 == 0)
            </td>
        </tr>
        <tr>
            <td>
                <div class="page-break"></div>
                @endif
                @endif
                @endforeach
            </td>
        </tr>
    </table>
</body>

</html>
