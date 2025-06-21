<?php
$pageTitle = "Print Pelanggaran";

include '../connection.php';

// Check if violation ID is provided in the URL
if (isset($_GET['id'])) {
    $violationId = $_GET['id'];

    // Retrieve the violation data from the database
    $query = "SELECT * FROM siswa WHERE id_siswa = $violationId";
    $result = mysqli_query($connection, $query);

    // Check if the violation exists
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['nama'];
        $kelas = $row['id_kelas'];
    } else {
        // Redirect if the violation does not exist
        echo "<script>window.location.href = 's_pelanggaran.php';</script>";
    }
} else {
    // Redirect if violation ID is not provided
    echo "<script>window.location.href = 's_pelanggaran.php';</script>";
}



?>

<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">

<head>
    <meta http-equiv=Content-Type content="text/html; charset=windows-1252">
    <meta name=ProgId content=Excel.Sheet>
    <meta name=Generator content="Microsoft Excel 15">
    <link rel=File-List href="sp1_files/filelist.xml">
    <!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
x\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
    <style id="sp1_1618_Styles">
        <!--table
        {
            mso-displayed-decimal-separator: "\,";
            mso-displayed-thousand-separator: "\.";
        }

        .font51618 {
            color: black;
            font-size: 12.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: "Times New Roman", serif;
            mso-font-charset: 0;
        }

        .font61618 {
            color: #333333;
            font-size: 12.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
        }

        .font71618 {
            color: black;
            font-size: 10.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: "Times New Roman", serif;
            mso-font-charset: 0;
        }

        .xl151618 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: general;
            vertical-align: bottom;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl631618 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 10.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: "Times New Roman", serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: normal;
        }

        .xl641618 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 10.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: "Times New Roman", serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl651618 {
            padding: 0px;
            mso-ignore: padding;
            color: white;
            font-size: 10.0pt;
            font-weight: 400;
            font-style: italic;
            text-decoration: none;
            font-family: "Times New Roman", serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: bottom;
            background: black;
            mso-pattern: black none;
            white-space: nowrap;
        }

        .xl661618 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 10.0pt;
            font-weight: 400;
            font-style: italic;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: bottom;
            background: black;
            mso-pattern: black none;
            white-space: nowrap;
        }

        .xl671618 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: "Calibri Light", sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl681618 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 12.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: "Calibri Light", sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: normal;
        }

        .xl691618 {
            padding: 0px;
            mso-ignore: padding;
            color: #333333;
            font-size: 12.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: general;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl701618 {
            padding: 0px;
            mso-ignore: padding;
            color: #333333;
            font-size: 12.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: left;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl711618 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 12.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: left;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: normal;
        }

        .xl721618 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 10.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: general;
            vertical-align: bottom;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl731618 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: left;
            vertical-align: top;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: normal;
        }

        .xl741618 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: left;
            vertical-align: top;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .xl751618 {
            padding: 0px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: general;
            vertical-align: bottom;
            border-top: .5pt solid windowtext;
            border-right: none;
            border-bottom: none;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }
        -->
    </style>
    <title>SIMADU - <?php echo $pageTitle; ?></title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
</head>

<body>
    <!--[if !excel]>&nbsp;&nbsp;<![endif]-->
    <!--The following information was generated by Microsoft Excel's Publish as Web
Page wizard.-->
    <!--If the same item is republished from Excel, all information between the DIV
tags will be replaced.-->
    <!----------------------------->
    <!--START OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD -->
    <!----------------------------->

    <div id="sp1_1618" align=center x:publishsource="Excel">


        <table border=0 cellpadding=0 cellspacing=0 width=576 style='border-collapse:
 collapse;table-layout:fixed;width:432pt'>
            <col width=64 span=9 style='width:48pt'>
            <tr height=125 style='mso-height-source:userset;height:93.75pt'>
                <td colspan=9 height=125 width=576 style='height:93.75pt;width:432pt' align=left valign=top><span lang=IN><!--[if gte vml 1]><v:shapetype id="_x0000_t75"
   coordsize="21600,21600" o:spt="75" o:preferrelative="t" path="m@4@5l@4@11@9@11@9@5xe"
   filled="f" stroked="f">
   <v:stroke joinstyle="miter"/>
   <v:formulas>
    <v:f eqn="if lineDrawn pixelLineWidth 0"/>
    <v:f eqn="sum @0 1 0"/>
    <v:f eqn="sum 0 0 @1"/>
    <v:f eqn="prod @2 1 2"/>
    <v:f eqn="prod @3 21600 pixelWidth"/>
    <v:f eqn="prod @3 21600 pixelHeight"/>
    <v:f eqn="sum @0 0 1"/>
    <v:f eqn="prod @6 1 2"/>
    <v:f eqn="prod @7 21600 pixelWidth"/>
    <v:f eqn="sum @8 21600 0"/>
    <v:f eqn="prod @7 21600 pixelHeight"/>
    <v:f eqn="sum @10 21600 0"/>
   </v:formulas>
   <v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"/>
   <o:lock v:ext="edit" aspectratio="t"/>
  </v:shapetype><v:shape id="Picture_x0020_5" o:spid="_x0000_s1029" type="#_x0000_t75"
   alt="DU" style='position:absolute;margin-left:9pt;margin-top:11.25pt;
   width:75.75pt;height:75pt;z-index:1;visibility:visible' o:gfxdata="UEsDBBQABgAIAAAAIQD0vmNdDgEAABoCAAATAAAAW0NvbnRlbnRfVHlwZXNdLnhtbJSRQU7DMBBF
90jcwfIWJQ4sEEJJuiCwhAqVA1j2JDHEY8vjhvb2OEkrQVWQWNoz7//npFzt7MBGCGQcVvw6LzgD
VE4b7Cr+tnnK7jijKFHLwSFUfA/EV/XlRbnZeyCWaKSK9zH6eyFI9WAl5c4DpknrgpUxHUMnvFQf
sgNxUxS3QjmMgDGLUwavywZauR0ie9yl68Xk3UPH2cOyOHVV3NgpYB6Is0yAgU4Y6f1glIzpdWJE
fWKWHazyRM471BtPV0mdn2+YJj+lvhccuJf0OYPRwNYyxGdpk7rQgYQ3Km4DpK3875xJ1FLm2tYo
yJtA64U8iv1WoN0nBhj/m94k7BXGY7qY/2z9BQAA//8DAFBLAwQUAAYACAAAACEACMMYpNQAAACT
AQAACwAAAF9yZWxzLy5yZWxzpJDBasMwDIbvg76D0X1x2sMYo05vg15LC7saW0nMYstIbtq+/UzZ
YBm97ahf6PvEv91d46RmZAmUDKybFhQmRz6kwcDp+P78CkqKTd5OlNDADQV23eppe8DJlnokY8ii
KiWJgbGU/Ka1uBGjlYYyprrpiaMtdeRBZ+s+7YB607Yvmn8zoFsw1d4b4L3fgDrecjX/YcfgmIT6
0jiKmvo+uEdU7emSDjhXiuUBiwHPcg8Z56Y+B/qxd/1Pbw6unBk/qmGh/s6r+ceuF1V2XwAAAP//
AwBQSwMEFAAGAAgAAAAhALictV3KAgAA7gYAABIAAABkcnMvcGljdHVyZXhtbC54bWykVdtq4zAQ
fV/YfxB6d313LsQpzcVLYS9ld8s+K7JcC2zJSEqTUvbfdyTFLaWFLU1eMtZIc2bOnJEWl8e+Q/dM
aS5FieOLCCMmqKy5uCvx7e8qmGKkDRE16aRgJX5gGl8uP39aHGs1J4K2UiEIIfQcFkrcGjPMw1DT
lvVEX8iBCfA2UvXEwKe6C2tFDhC878IkiopQD4qRWreMmY334KWLbQ5yzbruykOwmpsrXWLIwa6e
9jRK9n43ld0yWoQ2KWu6CGD8aJplHGdp9OyzS86t5GE8Ys1xzR3Jkumk8OHA54642M+ARj6BLOO3
gbNilhT5k+9dwNEsT99EHvEGTj2wuL/h9Eadsvh+f6MQr0tcYCRID40Cr9krhnKMaqYp9GZzC7SR
OTuar9qcmkY+0LKecDFGQnvFS/xYVckq31ZZUIEVZNEqC1bbbBZUSTrdJpNqnaTFX3smLuYUGm5A
bdf1mENcvMqi51RJLRtzQWUfyqbhlI3SAeHEWeiycCU/pvFkHUXbSTCZTNdBlk4nwWyVXgXFdLPJ
Z9UkXWWAHi4Xoat+/AcWwHSSsfQ9M2l5tbut6wXNu44PFe86pKT5w037qyUDUB07NqxzrOhVPf8f
BF+PH6V3DZInZSPpvmfC+GlSrHPc6pYPGiM1Z/2OgSrUdR1jRGGQDeQ7KC6M5YPMtaI/GT1bDagr
cTqN4PLYlTiPovQU3ShmaHsuK2MvRvp9p/QAkt8dvskaSiJ7I10Xjo3qz8WzxAC76AitdZcHRg9g
ukvBFwYzhCi4Z0WWFzBhFPyzPIHKrR9kZtOwYQalzRcmz04J2UDQR+iVK5Pcg3o91Ahh4YR08vQq
+vBsO2V04lwa0cGT4hL2mbnIPTdMoY73JQbJwM9z2sI7sBW122II77wNXHbiNIu24yfz6RqkHQf1
b4ghlg07sS8ejtOaf6iW/wAAAP//AwBQSwMECgAAAAAAAAAhADWcUFf0aAAA9GgAABUAAABkcnMv
bWVkaWEvaW1hZ2UxLmpwZWf/2P/gABBKRklGAAEBAQDcANwAAP/bAEMAAgEBAQEBAgEBAQICAgIC
BAMCAgICBQQEAwQGBQYGBgUGBgYHCQgGBwkHBgYICwgJCgoKCgoGCAsMCwoMCQoKCv/bAEMBAgIC
AgICBQMDBQoHBgcKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoK
CgoKCv/AABEIAPEA8QMBIgACEQEDEQH/xAAfAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgv/
xAC1EAACAQMDAgQDBQUEBAAAAX0BAgMABBEFEiExQQYTUWEHInEUMoGRoQgjQrHBFVLR8CQzYnKC
CQoWFxgZGiUmJygpKjQ1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoOEhYaH
iImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4eLj5OXm5+jp
6vHy8/T19vf4+fr/xAAfAQADAQEBAQEBAQEBAAAAAAAAAQIDBAUGBwgJCgv/xAC1EQACAQIEBAME
BwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYn
KCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeY
mZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/
2gAMAwEAAhEDEQA/AP3X+Df/ACSfwv8A9i5Y/wDpPHXS1zXwb/5JP4X/AOxcsf8A0njrpaACiiig
AooooAKKKKACiiigAooooAKKKKACiqt1L5SF2YABjkluKk0+6ivbNLmCQOjA7WUgg8+xNJNMSlrY
mooopjCiiigAooooAKKKKACiiigAooooAKKKKACiiigDmvg3/wAkn8L/APYuWP8A6Tx10tc18G/+
ST+F/wDsXLH/ANJ466WgAooooAKKKKACiiigAoopGOBnNAC0VFPcLEpO7BA4B9ax/FHjjw74M0ub
XfFniaw0qxgTfNfaldxwwxr6l3IAHuTUynGHxOxMpwgrydkbtV7i5WBQ5c4J618r/En/AIK8fsye
GtVbwp8JrrWfibr33Y9J8BaS94GboP34AjIJB5QtjB49fKvGHjH/AIKHfthW7aZ4u1K1+Cngq4f9
7puj3YudcuYTnhrhcCAn2CkdCrV8JxZ4m8F8E4b22bYuMO0b3k/SKu38jx45xTxs3Sy2EsRU2tTV
0n/en8Ebdbu67XO7/bg/bg1e41a4/ZJ/ZSul1r4j60slvqF/asWtvC9uSFkuJpFyBKA2FTsSC38K
t57+yp+0p45/4J/+JLL9lr9q7xRNfeCb6bHgT4jXG5YLdnyz2V0ST5YV8lWJ4Dckrgrz3xN1X4J/
sA/Bafwd8GdKtovE2sxBbWeYiW9nkOQby4kblguSVHC7vlUAZrnP2Qvjv4J+O3gGf9mf9oyCz1iS
YMmmnWVDi/jJz5WW581CQVYHdgDGCpz/ADNX8fOM8bjnxJgMG/7LptwdNr97Ug9HWT1tyvZap630
V15dbDUo57HCYjGKGYSV4pP9zTW6ozvZyc18UnZppWSukfp3pWvWesW0V5peoR3MM6hopoZNyupH
DKRwQeua0492Tu9eOa/Ozw58C/2sP2U71r39i341x33h1WLp8PPHbtdWiDqVt5874gc52jb3JZs8
97of/BWTxL8N5I9M/a+/Za8X+CSoAufEOlWf9qaUPVvNh5A9hvOPWv6D4P8AGbw/40oR+pYuMaml
6c2ozT80/wA0etWzHEZVJxzShOjb7VnKl6qcU0l5Tsz7Yoryj4Mfto/s0/tAxxj4RfG7w9rVxKgY
adDfLHdjqcmCTbKB7lex9K9Otr1XYCSYHK5HI/pX6dTrUaqvCSfo7no4fFYbF01UoTUovZp3X3rT
8SzRSKysoZSCCOCKWtTcKKKKACiiigAooooAKKKKACiiigDmvg3/AMkn8L/9i5Y/+k8ddLXNfBv/
AJJP4X/7Fyx/9J466WgAooooAKKKKACiikJx6fjQAy6mMERkBHXvXnH7Qf7Unwk/Zl8FSeOvi/4z
tNKs87bWJwXnu3/55xRrlpGPsOM5OBVj9pr4+eDf2cfgjr3xk8cS/wCg6Nbb1gRgHuZiwWOBM/xO
7Ko9M5PAr4m+B3wU8V/HLxkn7Yn7XrLqXijU8TeGPDd0S1l4aszzHHHG3Hm7fmZjyDjPz5NfmPih
4oZL4YZI8Zi/fqy0p018U5fPZLdvoeXVqY/HY+OX5ck6slzOUr8lOO3NK1m7vSMU05O+qSZ0mu/t
k/t4ftWTFf2c/hbZ/DLwjN/q/FnjSETalcRno8NoMqhIII37lOeH4rG0/wDYC8HeK9Uj8VftPfFP
xX8UtYU5aTxBqbx2URPXy7ZGAQf7OSO2KX42/t+fDT4a3E/hvwDajxFqkWVfyZ9lrC/fMgB34P8A
CvHbcK+YviV+138f/ipJJb6r4zl06xkBH2DRs28ePQkEuw/3mP4V/HOY8Y+OniVzOVd5dhZbRi3G
Tj0f/Px385KL6Hk5ljeAsiny46bzDELe9nBPtyq1NW7Wk13PtXUfHH7MP7M+jLosN/4d8NwxpkaZ
pNuiyt2BMUILE8dSPx4rwv4x/wDBSqW5tZND+CfhUwEnaNZ1cLuX3SEZHToWJ917V8r/AGaSY75W
LM5LMzHJJPU1ImnZXIUVy5R4ScPYHFLF5jOWKq7tzk0r+cVe/q5PzTPmc28Uc8x1H2GXwjhqXRRX
vW9dLf8AbqXqReJtc17xlrtz4m8V6zc6hfXb7p7m6k3Mx/oOgwOBiqMEP2edbi3kdHUgqyNggjoR
juK0xYEHlBS/YQR0UfWv1WnUpUqSpQilFK1lZK21rJJWtpa1j8zqRqVajnPVt3u9Xfvd6389z3T4
Lf8ABQr4meALaPQfiBpq+JbBRtW5kk8q7jX3fBEv/Ahu/wBqvonwF+2/+zr8QVS1uPF76TPMADaa
9D5OSe5cFo/zfNfALWAAPy547VC9psP3MfWvzfPvCrhLPKjxEIOhUlq3TaSv35bcv3WfmfoGT+JP
FGT01TnNVoK1lUV2vSV+b7215H6FfEL9jX9k/wCOtsNcuvAWlG5m+e31zw1KLafPXessJAZs4OW3
Vzel+Hv28f2QmGr/AAG+L0nxN8MxNufwT48k3Xqx/wB2C74JOOAGKqMfdbpXxj4O+IXxC+HF6uoe
BvF9/pkobLC1uSqPz/En3WHsQa+lPgX/AMFGbozW/hn45aXHtc7Br9hHt29gZox27lkxjP3O9edg
aXjF4aSVfIMxliqEWr0p3lp5Qlzf+SST8mfVYPibgTiHEf7VQeCxEtqsGoq77yStv/PCS8z7P/ZD
/b3+F/7WMN1ommrN4e8V6OCniHwbrsfk31m4IGQDjzEz/EBxkBgpOK90guWlkwDkdsDt9a+AP2kf
2f7v4gWOm/tK/s5+IU0/4jeHohe6DrOmuoi1WJQT9lnxkSRyLlfmyMkA/LmvqH9iL9qPRP2sfgfp
XxK0+zSx1FGax8RaQch9P1CIYmiIPIGSGXPO1hnnp/YPhF4t5X4oZPKrCPs8TSsqlNu7i+62unq0
7LtbQ9+KzDLcwWX46SlJrmhNKyqQW78pLTmXW6ktHp7LRRRX7CemFFFFABRRRQAUUUUAFFFFAHNf
Bv8A5JP4X/7Fyx/9J466Wua+Df8AySfwv/2Llj/6Tx10tABRRRQAVHNcpAQH70TXUNucStjjNePf
teftefCz9lLwQni3x3dS3F7fMbbQvD9gokvdVueMRQoMngkZY8LkdyAcqtajQpupVkoxWrb0SS3Z
y43F0MDhpV60lGMdW3sv6283otT1u61WK1jEkigAju2K81+Jn7Yn7MPwwnbTPiJ8ffCGi3UZJktL
3xDAswx28vduz7Yr43vPh7+2J+2wf+El/ab+KGpeAfCN3g2Pw28J3RinaA9BeXAOWYgjKc844Qgi
n33wP/4J4/sv2aweJfAHheG4CZVNTtTqF4/TkJJ5jj03YC8c461/NfE/0nOEMszOWXZNRqY6sna1
KN43W9n1+V0csFn2Jw/1tQhh6G6nXlyO3R8ltF5SlGXSw/8AbG/aN+DX7bPx1+D37Ovwa+Itj4m8
PJr91r/jBdPdmjxZwhoInyAGVy0uQcjp7Vyf7fH7SWp6ffy/AnwJf/ZtsKtr93bnDneoItww5Hyk
FsY+8B6iprb9s/8AZQ8E6obv4cfAh4bmFWQXlno1paEqwwQGU7sHvkDPvXzF4u8Q33jPxXqfi3VX
ZrjUr6W5kLHoXctj6DOPavxzOc0zTxO42p53m+Blh6OHglTp1Gnebldytsna2m58Xm+c0sryuvRw
eLhUxGIl70qfMlGnCKioxb111u13l3ZjJZnJYgHjPSrMFtuP3Og9avtouoWUMFxeafPHHcpugkki
KrKoOCVJGGGcjj0r2L9mnwB8KvEXhDxbrXxQ0S6uIrP7BBbT2e4y2xnkkQyKq/eIIQ8g8A8HJr1M
3zzD5VgpYqSco3Wkd23JQ076t/c0fE5NkeIzTHRw0Gk2m9dtFza+bXzPHrDw5q2o2M+pWWlXEtvZ
gG6njhZkiDHA3sBhcngZ61t/D/4Z698R59StdBnt1fS9In1CZZ3ILxxAEqmAcscjAOB717j8Nvgz
4h+HfjbxV8DtdiMtt4p8NTjRrxVIiu5Yh5kRGTwwzyDyD6jBrN/Z2+G3jX4bfEKw8S/ELQJtF0PV
Le50+e81ORIAPMhcjIcggZQckAD1r5DF8YwnhMTLDyjzRip0tbuouVtpLq/dmtNnZbn0uD4QnDE0
IVoycZScKllpB3UU2+nxRevRt7I4rTv2X/Fmr6z4Zt9J1m0u9N8TRGWLWbRHaG2VAWmWQMFKNGoJ
IOM8gHg4Z8OP2cdV+LXinW9C8HeILc2Wj8DVLmNkjnJcrGAFyVL4YjPYV0/wU8fHwx8LvHXgS88U
raLcafu0qIyj55s7X8s9cshwcdhW74K+I3wm+Efw58PeGpZtRv76bUU1vU5tDvETyZ0bEMEhcHcA
oyVHcZ9McOLzniXDTrUqXvyTUYNR0s1z88tlflai0pW5tb62PSweU8M4mFGtNqMWpSmnPW6fJyRf
bmTknZu107WueKeCvhX4o8feKH8H6Daxi9himknW4m8tYliBL7mbgYxjnvxWQvhHWr7R7nxHbaHd
SWNi6JeXawsY4GcnaHYDCk44z1PAr6fhvfAHgrxx8RvjFot9p+q2N/oUUlhZx3a7p5Lx186NihJQ
70YH0DCuX+JmreEYP2X9PfwT4QOhp4p8RPcT2X9oNcBkt1K5DMAcGTacdMAnNdWG4ux9fE04+xfJ
N0430Vm4uVTdqTcVa1o2und6o4sVwpgKOFqVPbJygpystbpSjGFrJxV3rrO9ntofO01nsKkJ61Vk
tc5Pl969q+D/AMNvAX/CD678Vvi7Y3M+jWZjsdPt7KTZLcXUh3Exk4G5FGcHjDHPSuc+Mfwm0jwV
baP4s8Ja5NqOg+IbR59LmuoPLmTY5V45FHGVOBkda+rocSYKrmMsFZp7ar3W7OTjf+ZRV9beV3t8
5iOHsZQy+OJcotb2TXNa6iny/wAremm99bLfu/2EP2jL7wT4ti+Dvi/UXfRNZnMemNK+RaXTH5VX
PO1zhcDoxBGMsT6n4D+N3gD/AIJ8ft2+Ib/4j+IBovw++KegHVGmaB2ig1q2YK5ARSRvR3JwOWkT
OMV8aeXNaSLdW8jI6kFWVirZ4PHevpJ/2/8Awhr0elyfEX4FW+r3GnRjbdSyxSMrlQJHQPGdm4qD
gHtXJhKmccDcdw4kyXCusqsJRrUlJRUna8Z66J3s9m7q6V2fS5Ln+GxORwwOOxKp1MPUjOhUkpSS
TvGUHy3bVrrdLVa6H2D4d/4K6f8ABPzxPfrptj+0NpsErSBA2o2txbR5P+3LGqge5IFe6eEvib4N
8faJF4l8D+IbDWNNuP8Aj3v9MvUnhl9droSDj2r4T8E/HX9jr9omM+ENf8GaRb3VwAiaX4j0aDbK
T/CjkFGPsCGPYVQ139jzxn8Cddm+Kv7BPju68J63GRJfeEbi7eXR9YAGDE0bEiNiOARkLxjZjI/T
ck+lDlv9sRy/iTAVMC5OylL3o+raSsvOzS6n3VKOfPCfXMLOljKS1l7K8ZpeUZSkm/7rkm+muh+i
4uAc4Xp6mpByK+ef2I/23vDX7Uvh6+0PXtIm8O+PfD0oh8WeEL5wJrSQcGSPJ/eQsejDOMgHqCfo
VWDAEDqK/qbC4vDY7Dwr4eSlCSTTTvdPVbHZgsbQx+HVai7xflb1TT1TT0aezQtFA5GaK6DsCiii
gAooooA5r4N/8kn8L/8AYuWP/pPHXS1zXwb/AOST+F/+xcsf/SeOuloAKb5i5IweOpxTqoaneRwJ
MEuArquTntgZ/lSbsJ6dTjP2j/jv8O/2c/hdq/xc+Jd+bfTNKs2dgigyTyEYjhjB6u7YAH4nABNf
Fv7Pvw08efHXx9J+21+05aM/iPVEJ8F+G5h+58OaaSTGqqePNcNkscEZJ4LHCePfGt//AMFF/wBp
5Vjl8/4O/C3UyLcqoMPiTWl4DnoHiizx2Oe4fjof2w/2jbf4CeAPsfh6dF8QazG8WlxEf6hejXJH
oucD1Yj0OP4j+kP4n5pnubx4E4bm+abSrTi7aNfBddEvelZ7NLujzMu+pYhVOIcxf+yYe7pJ/blH
Tnt11vGlpu3LR8rOM/bC/bWHw5u5/hh8J7tTroTZqWpptZdPyP8AVpxgy+pPCehb7vxrPf6jrmoS
6trWoz3VzO5eae4kLu7HqSTnJqsrXF/dPeXdw8s00heWWRizOzHJJJ6kk5rR0+zedlht1Lyu4VUV
ckn0A7mvM4a4UyjhDLPY4eKlN6zm1rJ932XZbL1PxviHifNOKcxdWrK0FpCCekV2833k9X3sFvas
fkiDZJ4WvRPgT4B8GfEXxBd+BvE2pT2epX9iU8P3IIEQu+SqyDGSGxtHPtgkjN/4Gy6p8FfjVoWr
fELwzLZwSSBJo9UsyhWGUGPzQHGRtJzkehr1/wCLHhv4GaRqKr8T0g8NeJnvZGtNR8HISBArHybi
eH7sbNjO1fm78YxXz/EPEk6eLWDoxlepC8KlO0mmm7+7a8krLm1tZ7anucP8P03h5YytKP7uVpwn
eKtZWvLo3d8t7arfQp3Hw88PeIfhz/wznrHjS2vfGugJcXelCGE+XbkYZ7DzjjzD988AAEei88B8
JPi1d/CnwR4r0PSJb211nV/skdleQIu2DymkMhbdyDtfaMAn5s8ECsz4v/FKDxh4gk+IV8LfTHtN
PSPUNWSTyPtHloVa4k+bbGSoBIzhQvU4zXzqf2gviZ8bryXQf2TvCdvPp0TNFd/ELxDFImmRsDhh
bR8PeOOSCuEBHJIPMcP8LY/McvnDEtOnNxnU5rRhCXNzNOS0cW7csFG+9k3c9jEY2dTMFUwUOX2a
cIzu7cvLypyvrzW00cm7bWtf6J1L48+PNJ0OMeIPiPLb21hcNdR319dKsluzKQzec/zKpBbgMBye
teJeLf27PgRPrD2EfxLv/F2qhzutvDlncapKT3y0Ssvt97tUGh/sW+DPEF5B4h/aF8Wax8R9WR9+
Ncn8vToWPXybGLbEg/3g59zXrnhvwf4f8Laamk+GfD9jp1qgxHbWFmkMa/RUAA/KvpFh+Ecrk+WD
qT68vLThrva8ZSmr/wA0Yt9jz6k41IJVqk6jVuumll1be2mi2PGE/as13Ulx4Y/ZQ+Kl7GSMXFxo
MFsr98gSzg/mBS/8NTeM7Ib9c/ZC+J8MQ6yWmm2l0ePZJ8j8q95XTpCclhgnJwKDY7OWk6VTzvJ1
Nf7Grf8AXyV//SkvvRCjQ0/daf4p3/Q8Hh/bc+BFpdLY+O5te8HTvwieLPDtzaL0/wCehUxj/vrF
eo6B8QdC+Ivh21l8MePLbW9LgBFkbLURcQxhsEhdpIXOASPat7UNDsNTge1vrOKeGQYkjmQMr/UH
rXlHjD9if4J6vqbeJ/BGn3ngfXm+7rfgq6awkHf54o/3UgJxkOhzj3raNbhnGfYnRfd2qRXrtJX6
uLlJ9mtCXTws2+XmhffW6+a0b/E+idM+IPwt8VfDPSfhh4/sdZ0u20eWWWK80Vo5EupHJLNLG+CG
5IBBOPTFdpP8NtH+O91o+v6gDpPhLSdOa18MeHYbyJtS1RIgN5VS21GYgZOSeAP9qvh268c/tJ/s
7Jn4x6R/wn/hOIfP4s8N2Aj1GyT+/dWY+V1Hd4eg5K9a9S8DfEHw38QPD9j47+HfiiHUrCT95aXt
jMSFI7ZHKMp6gjKkcjIr5vNuDMTQp/WsFXdm5NTi3UjzT0lZO3LKV/tLmim3HU9WGazw0F9bpxqU
7Rjdacyh8Kk1uo6e5pdpc1+vq37WHh/wpYS+D9C8I/DePQr+bRFmutPgVmmUyPiKKQkZaQANkkZJ
Y+leSeO/AHiz4faw2geMNDuLC6VA3lTr95T0II4I/wACO1fSmjfGP4W6n4+h+N2t2T32vXl7b6do
/h8SB20uNURXuCzDDPksycHluxJK5f7RK+GtJ+H+ueA/GXxJj8U+IbfXlPhtXt2N9YKz5mjlfABU
huF6ZxjsF8TIc9zDKqmHy+pSdre83zNuUpJyte/u0+ZJ8261WxOeZBgM0jiMdTqxutorlSUYxtHm
Wj5qijdcq0ejV2j5duIMEyDPA4wK+pP2KP2zL6G+svg78XdWMsMkgi0XWbqUlkfICwyseqnornkc
Akg5Hzv4v8H+JPB+pf2N4o0a4sLryUl8i5hKtscAqcH1BrnbiIxucOVIGflODX3efZBk/GOTvC4m
KaavCSSbi+kovt3s9UfFZFnea8KZqsRQbTi0pQeikusWrb22bV13PvT9p/4LeONM8Qaf+1R+zcfs
XxF8JjzDEq4TXrEZ82ynA+9uUkL1OflznaV+r/2R/wBp7wj+1Z8ILD4teE5/LW4Bh1HTWIMmn3aY
Elu+OjKfUfMpVuM4r5H/AGGf2nG+Lnhr/hXXjPVQ3iHRbf8Adyu/zX1uBtEnPJZflVu5yD1Jqn4o
1nXP+Ce/7QR/aa8EWkrfDXxldxW/xM0S1TcLG5LYj1KJO3LHcAOSWByXXaeAXiTmXBfEMuAuIp+6
5WoTd2rtaRTf2Zbx7bdj9ox9XBSw0OJsrV8PV/jxX2Xt7RrvHapbVpc2p+jaEMgYdxS1meGfFnh7
xZoNj4h8PaxBeWd/aJcWlzbuGSWNlDB1I4IIYH8RWkrBhlTkV/dMZKS0Z6MZRlFNO6YtFFFUUFFF
FAHNfBv/AJJP4X/7Fyx/9J466TzEzjeM+ma5v4N/8kn8L/8AYuWP/pPHTfih4v1Xwd4D1TxVpPhO
51q50+0lnh0mxkUTXZRS3lpuwNxxxmgzq1FSpub2Xr+ib+5HRTXMaKdsybh1BNfEX7cX7Uvij47+
Nrz9iT9k3V9+p3INv8RvGVqxMGgWRwslurrw1w43JgHIJK5BLFPOLP8AaV/a8/4KLaNe/wDCFa3p
fwi+HaXktlq81neG61252f6yPO1VtuDz91gGzlh10NG+Lv7GX7F3gU+CfAmtWl7PbkyT2uksLu7v
p+heaZfl38dXZcA8ADiv5o8VvHGGVRrZHwvSlicf8L5YyapN9Ze7bmT2XRq7djwIV457ho1q9RYf
AvV1JS5JVI6+7STs0n1m7SSuoxb1XpOl2Pwo/ZH+BSaVZumn6D4dsAiK7Zlnb15x5ksjk+5JJ4xx
+evxi+KviH42fEW88eeIH2mc7LO13krbQD7sa/T9SSepNa37Rn7T/jb9ovxEtxqiCx0e1ctp2jwy
krHngO5IG+QjjOAAOABkg8LYxMcOUBPpX4TwBwPX4cVTM80lz42tdyb15bu7ins23rJrqrI+D454
0ocQKnl2Wx5cLRtZLTmsrXa6JbRT1tq9S7ZQEOu3Fej/ALOPiXwl4I+KNl4g8Yy+TapFMsN8LXz/
ALHOyERz+WPv7WIOB/SuBtom44A68gc9O3+e1fXPgjSvgD8SPBeneMbb4Q6ENHsbF18TyfbXgvNM
kjjyDhP9eHwApODk8kc138aZxDAZdKnWpzlTqqUXKHKmrqy+LRuTuorW70OTg/KquPzFVKVSEZ03
GSUlJ3s/7qvaO7emmvRiaJYfDfxoWOq+EtR8T6G2nTya38SvEsksTL5atsFsXGUAc7Qv3iSeDjNf
Pvxq+NunNpDfEX4n6tZafp+haPHBcajKuwmKIYDyYzukbcBgZySAOtdJ8R/iJ4b12ztvD3w603WN
F0SFWe406+1iS4hMgYkOqscKAO2OSfz+YvDmnn9sn4ov4y1iMyfDTwdqjR+H7Jv9V4h1OIlZLuQd
JLeJwUjHIdlLHgba4+E+G6dN1MZjG1SjdvmvzJNtW0fJzz+Fxj7iSu1aB9Nj8x/tBKnBqMIWcpQ2
k3ZpRv7zS1ScvebcpXsO8P8AgDxr+2JeQ+N/jNp97ovw7WRZvDvgSVjHNqyg5S61DBztPDLbnj7p
bJHzfQmlaRY6ZYw6Zpenw21tbwiK3t4IgiRIBgKqjAVR2A44qa2tyXC7QeMk1qafp7SkALxXbnWf
VMY1CyjTjflgto30dn1k18U923rpoeUv9onGMVyxWyW1vPu31ZXtLDJGEyPpWjDouVGOMmtXTtGD
BQUFbFnojk4MIIr4jF5l7LqexhsvbSdjnotGAjOUXI6nFNl0NGBPljPriuyh8PhgflIOe1cd8cvi
p4P+Afg7/hJ/E0dxd3V1cLaaHounp5l7qt4/+rtoE6u7Hv0UAkkAZrlwWNxGY4uGGw6cpydkl/X3
6pJXbdken/ZbdrI5P4s+PfA/wW8JTeNPiDriWVkjCOFQhkmupm4WGGNQWlkY8Kigk+mBmvnbwr47
/aa/aL/aattFZZ/A/gnwnBDqevaRbyZv55JPntbS7kXKxvIoErwLkLH8rkswA9m8NfB3XtNN/wDt
bftazW83iLStMnvNN0C1k82w8J2kcbOY4WbiW5KLmW4IBLDamFHMn7Hfw/1DRPgLpnjTxTbj/hIP
G7N4m8QyHq1xefvQh9BGjJGB2EY6V+lYDHZRkmVV8RBKtXTVNTfvQjKXM5ezva/Ik/f1V5R5UlrL
GrgqeGpy5VdvS/n/AMMdLLagrkKPbivCviV+zx4o+Hfie5+M/wCyw0Vlrcj+br3g9pPL07xCP4iV
6Q3PZZlxkn5uCzH6L1DT2jckIABWTdW2wlggOeoNedk+d4nAVJSpNOL+KL1jJfyyXVPraz6pp6nz
fLVwsmo9d09n6/5rVHnfwH+PWg/FTSLX4heC0a31DSNRUajpOoQ7bjTL2FstBPGehBHsGABGckj6
P8Na7dnwprv7RWi+EV1rxrqHiVraCIRNNHowePcsyxcktn5VJ6cAdwfjr9ofwJr3wn8Vn9q34Qab
JNfWcSx+ONAtuBrmnLgs6jp9phUbkbqwBXPQH2P4N/GW9FhYfED4WePJ7PStetYpft9jhhJA+Dko
eGIyTg4IIxxzXRxPktHHYSOYZd8DsmndNK/NKjJpX5XpK691x0adpI6sDi6WAqKom/Zyei0bhNpq
9nopK7cdrp731Ov+Jvwf1210eXxX8WfGNxN431p430nw7DGbi6kRm5MwXJjG3cFUegGOCB4rqFu8
cjKygMvDKRyPrX0v8XPH9v8AAPUP7J+GOlPdazq1hHeT+PtXYT3F4kozugzkIBypOScggjgNXzpq
stxd3Et1eSNJNM7PLIxyWZjkn8Tk1PBuJzDEYV1av8Nv3HZR02dor4YpLS/vd7bHicW4XBUMWqVP
4/tK7lrbROT+KT6207X3dTwl4y8RfDfxdp3jjwndm31HT7gS28i9OOGVh3VlJUjuGNfon8H/AIo/
Dn9qz4TyXF9Z2dxFeWzWev6Lc4bymdcPE4PVGGdrdCPcHH5vXsJXBIzjpWz8J/jN46+B3i6Hxh4G
vwkv3Lq2mJMN1F1KOoPI9xyOoNTx3wTHi/A06+FfJiqX8OW3Xm5W1tG+qf2X5BwVxlPhPGypYqPP
hqmk47taKPMl1stJR+1G99T7S/Z/+NniL/gnD4+j/Z9+M2sXFz8Itdv3/wCEG8Y3IZxoUjtn7Bct
/DHkkq54Ayehfy/0F0bUrK90uC7t7yGRJYg6PFIGVlIyCCCQRjvX51+GP2yf2XP2lPBM/wAP/jDb
WulvqMIi1DSddGbeQ9cpLgLweQx2MD0GRmqegah+0n+wV4avPHv7O3xH0fx98KLKCS7bwj4n1YCT
T4FySLK9XKlVGeG+gUt1/TfCvxyxWDo08h40pyo4pWhCpKL5ar6e/FNcz+abu01sfo8ZYfK6Tr5X
UWJwKTfuu9Sit2nF6unHWz+KCVpJpJn6VqysNysCPUGlryL9jf8AaR1T9qT4KaZ8X9R+F+o+FY9W
kk+xWepTpKZ4lOBMjLj5GIbaWAJC5xgqT64PX1r+soTjUgpRejPawuKo4zDwr0neMkmnqtHqt7MW
iiiqOg5r4N/8kn8L/wDYuWP/AKTx10M8QlXY3Q5zXPfBv/kk/hf/ALFyx/8ASeOuloE1c/Pzx94R
sP2Yv+Ck174R0iBbfwr8aNDk1KK12gQxaxbZFwFHQb48OfUyD0r5a/bn/Zps/gP8SI9d8KQKmgeI
maW1iRfltZhy8Iz/AA8gr7cfw19q/wDBWvTk0TxD8Evi1bkJNoXxWtLNpF4PkXalZUz6MI8Vyn/B
QjwRB4l/Zs1XUmtlafR5ra9hbb0xKsbY/wCAOfyr+FfF2rU4I8ccHi6OlLMIxjUXRyT5VJrvdxu+
vzPj8bkNHNuGMywVvews3Vp90prmlFPtdTdvPyPzwhi2sDu6j0rYsV2qDnqKy7dMnf6AVtWABdRj
tX1GJmo01Lpbr5/rr82fh+Gpq9lt/l6X7HuX7PfgFNH+Gd58XLv4Yx+Kbm71aHStH0+6t2ktxnmW
aQKOmCqAnoSfrXaeIU+EXwC8W+KNY8GfEtJri7iuLZPCFvZPJb5ZSvlTSMdpCPk46rjGeaxvhf4Z
HwWsdMXXP2mp/Ces6rZRXqaGumy3FtHFIMx/aAf3e8gg/MPl6Z4rH/aP1XW5fEltoninwt4et9Sj
T7Q+u6DD5a6tDIoMcx5w2cE7vViO1fiVSnVzjiGpGVRzo1L7c1nBNJJKceVwi1bnpu93e9rH7HTq
wybIYNU1GtCz15W1Jp3fuy5lKSd+Wa5bRsryTPmX9qnxJ4gu9G0X4CeAb+S31/4hag9hHdxgbrLT
0UPeXPHQrEQo6cyAjkV634B8FeHPh74UsPBHhPTVtdN0qzjtrO3QY2ooAGfU9yTySSTya8e+CsI+
Jn7T3j74tXTiW08MeT4T8PtjhWQefev9TI8SZ9Exz292N3a6dbS6jqF1HDBbxmSaaZwqIgGSSTwA
B3PAr9Lz6pLCYejlsN0lKdv55pOy/wAMWo+vN1bPDnH2UIYddFd+r/8AkVon6vqadhBzjys5HrXS
aPp6lQRF2yeelfL7/tX/ABX+O2uXPg79ib4bQaxbW0rW998QvEpeHRbeRThhAB890y/7HA4JyvNd
LpX7AXjb4lodR/ao/a58beI3dR9q0bw/fjRdKUDJI8qDBYDHUkHA6V89jMgjhI82aYhUHp7nLKdX
VdYK3L2tNwfkfQZfgORpTdn26/dt+J6x+0P+0h8Pf2VfAdl498ZaTqmrLqGswaVY6b4fgSe6uLqY
OUVEZ1zwje+cDHNcVZf8FGIiqyw/sSfHWRT0MfgfOf8AyLXFa3+xL/wRf8Lv9g+IviLwVYXZHzvr
HxWliuCw75e8DA59OBzxTvC/7D/7AXiC6C/snf8ABRzWPB2rZBtIvCHxigu1DZ4BiMpdhjPy7gSO
K6cNlfh/HBqOKoYqUm2/aSoVFTtpZJQctF1er7n2OCwUORNI72x/4Kl/BfSPEkHhj4r/AAZ+I/gJ
7zTLu90+58Y+GhaR3f2ZA7Rx/vCzuSVRQoOXdF4LCu5+AfwL8YePPFS/tbftJaabbxLe25Twf4Wu
OYfCOnOcrHg8fbJVAM0v3gcRrtVfm8h/Y9/ZC+J/x6/aZf4hftGfHuX4reDvg1q11p3gbXdQ0WK3
/tDV28s3HK58+O2khUbmZt0yZUjyjntP+Cvfxd+E3hA/DD4HeM/D+qeJbzWvHdtq9/4P0G2a4u9R
021ScPEIUIL+bI8caqcBsSEf6s487H5fk64jpcOcPKSrVYfv6keaXJCznyw9ooSjePL7Xm5WnaG3
Nf1VgOWg6jX/AAR3x4v3/a38c3f7KHwznaXwvps8X/C2PEsDERLEpV/7GgkB+e4lGFm2n91GxDYd
sD2W98PwwQrDa2yRxRRhI40UAKo7ADgV812N3+2bbfD2DSPCXhL4afsmfDi3DNp58SvbXOqbCcmQ
wMVt4nYnJ8z58tkkk5PAXvgf9kPxNOIPjJ/wWR8QeKbl+Zo7X4r2WnWDk91it32D6hjRX4ZWIpU8
NHEclGje0aUKmIm5O3NKcqcfZKb5UnGM5ciiorq35mJwEXDU+rdX0vGf3Vc5e2WxyNvSvF9B/wCC
fv7MPi3Tzrnwb/ad+IFzjBTVvDfxUkuQrfwtuVmXPeqGp/s3ftm/CgNd/B39riXxPAjZj0T4lact
y0x9DdxAS5/D/Gt8LlOTOXs4Y/ln2q0p03/7cl6yskfI4/A0ot+9b1TX+Z7DeweYrxmEYJIO7kEf
Svn74R2z/AH4763+zlOPL8O69DJ4h8CKeEt8uBe2K5/uOVlVR0Rz6ADT8Oftjat4P8S2vw//AGtP
hVdfD3VLycQWOtm4Fzol9Iey3Q+WJj12yEYHUjpTv23NNutI8A6V8c9Bh3ah8Pdft9YDRjDyWRPk
3cOf7rQyOT/uKe1fX5VgcZhMS8Bi1+7rxtGSalByT9ycZRbTtL3Xa7tOV7I+fdKdOboTVlU0T3V9
4u+z109Gz2c3vjz4mQaP8OLC3k1E2Hmx6RaQwBpVEh3Mu4DcVyucE4HPStbxV+zHrHgjw9eax8Rv
H/h7Rr2G0d7bQ2v1mvJ3AysexMhSxwM5IGeai+AnxL0LwZ46sPGN/dzf2XfWMkU15aN+8jjniKiZ
COQRuDcf3ePSt6Pwp+y1pNy80niXxN49v3JdbLR9Pa2jfJ3Ydm+ckk8leRnoa+Ex2YYzLceqFOLh
STT92ndzlzSum5NU6fRu9neT1FgsBhsXhZTm1Otdx96o48qUY8rSSc5vdJLRKOx4NeRbSvzdvSsq
7GF3Z/irp/F1oLLXbu3Gi3GmgTsU0+6BEluh5VW3AHoR1571zdz1UHuxr9Py+vCpCNSOqf8AX9dD
83xtCVOo4vp/X/B7nQfAT4Kaj8e/izp/w9spZYYJZDcaldRjm3tkILtzkZOdoz3Yfh9gftNeAtO8
aeKfhP8AsBeAIDp+jeLNZSTXYrRiHTR7FRNKmeoL7c7jnJTnJ68t/wAErfClrs8YeOZbcGVpLext
3x91QGdxn3/d/lXrvwUtIvFH/BXe5kuwWTwx8HTJbZPCSTXio34kSGvh8gxa4y8fcHlFbXD4NOpy
9HNRW/pzRS7Wfdn69kWTU8t4AhXt+8x1WNOT6qkpvmS9YRld9dL3sfcHhHRtM8OeG7Lw/othHa2V
jbpb2ltEm1YokUKqgdgAAPwrRqO1KtCCvT2qSv75iuWKR99GKjGy6BRRRVFHNfBv/kk/hf8A7Fyx
/wDSeOulrmvg3/ySfwv/ANi5Y/8ApPHXS0AfHH/BaGPy/wBnnwpqK8Nb/FXRHVh16yj+tQftX2sd
x+zZ40gljDBNBuGA9CoyP1FWv+C0yj/hmDQGA/5qZopyf+ukgpv7TmT+zv423c48O3ufwjav4O+l
c+Tjzh6cekv/AHJTOfJnF1s5i/8AnzD8YVT8vrUfP97II/DvWzpzBJIpGUMAMlT3ArI09QQpcdgP
wxXReENQ07SvEGn6nq2lJfWtrdRyXNi7bRcIrAtGTg4BAxnB69K+pxjnGk5LWy/L8Pv07n804OMK
krXsm+vm+36I96tPib8J/j3rsb+MfgHqz6w8SJ9t8I3zySMqKFQ+U4wMKAMc9O9cx+0z4q06Lxxd
yrpd5Y2Ph7RoLaC01BAk0cUMIJDgEgNncT/9avcvAfxi8E/ECwvtO+Eni+z8NS3Hh66trDwnLp8F
m4vmjxFKtwOHw3PXPIOARXx3+07J4k0X4WfEL/hJJZm1Wy8O6oLt5pvMcTJbyhssCdxyOoNfkfCe
FpYrP+SdJ0VC0VSlKUpRc2m2ubZWhy+7dbWlY/YM8m1lsEqqre2kuapCEYxly3ST5db3mmuZqWjv
HRHMfsG6ZNB+zVoXiLUFJvvEct1rN/If+Wkl1PJMGPuVZR+HvXofxt8PyeJ/gr4v8ORKS2oeGb6B
Qp5Je3dcfrWF+y/aRWH7PngizhGEXwpp+B7m3Q/1r0dY4biJradQyuNrqehBHSvtc4xco8R1K76V
W/unc8aM28wlJ78z/B6fgcH+wVfy+Jf2KvAc/hy4hs7h/B8Ntb3CwBljmjQxCQqMbvnTcR3OfWvO
fin8Fv2c/AqDWP8Ago3+2vrfi6+nw1v4Vj1CSztSc5Cx6fZEyOc4G7hTjnFdF/wTCkA/Y5sfCV1L
Nv0HU9X0udoGIkHl3cxG3uGCuuOOtebfCbQfFHhSe78b/syfsr6T4XRZXOp/GX9orU2+23BzgukT
HzF9dwKqxPIHQ+3hcLXjxNmahWdNKq9Y+zhJ8zdv3005Q5rbQjKUu3U+ywTX1iavbV+Xnv0Xojs/
AOvfsjPZxL+zh/wR88VeLbXHyavqvge1tIbhOzpNeszuPqB1NN+IfgvwF8e9Z039liL/AIJQ6f8A
DTx144ZotD8UahY6dJHpdorL9r1DNrhswRMzKvKtIY1OdwBzpvjjolzqq23xk/4LetaXZI3aZ8O/
CcMVvAxP3VmiWUuB6kg8Dp0P0/8A8Euvg74pXw5d/tUfFrx34j8U6z4th+y+EdS8XSh7618NLIXt
AwAARrgMJ2CjG1ol52kny+IsZHhLLauc1uZ1I2VO88XzTqO/K25+ypzirOU0oWlFJLdH2mBgpuMe
/wCR7H8TbH4afsP/ALDmraV4Nkk0rTvDPhOTTPDUds5+0z30kRito0K8vcSzuuCOS7FjxzXx58D/
AID+FfhT/wAFFrTxn8X/AB9rWp33wn+ANtrvxQ8YeMNbe+lt9avIzH5PmNwkENsszIoyRuPXcSfo
n4Mi4/a0/bO8YfE74haHc3fw/wDhNq0elfDRWuE/s+bW4Rtv71os7pp4n/dRyMNiDdty+WXyH9n3
Uv2hvivof7Qn7V/7PFh4DbV/iN8X5NFTUPiA8x06Lw5pcDWsc4WMfvfnaQBSQp+YnOMV8JwvDFZN
l2YYavWX1itCDxE5NJc+JcOSlzNS96NJ1ZTumvaNJx9096pGjUjFpaK9v+3Ve/zdvxPIhe/8E7fG
njzUvG/gP9m340/tPa5c3bu3ibVdCub2wjBcsIka7MMSxqCQB5bZx3FdPqniQQ6d5F7/AMEOrqLT
tnEUVho0kiqBnmILmneLPFNvosp0744/8F2dN0+7hGz+xfh5pmmadbWR7xKI/MdlBPBbBx2qTwfZ
fF/xJch/2W/+Cxuk+M7lBmPQvFmk6ff+eR/CXidZUHY7VPXpX6DXjCUFUdSUorRSqSx6jbylTpUq
cV6U1Fd7Hh4t21a07af53PKNT07/AIJueLvGEGmXHgXxv+zf44Jxpl7cWVxoLs5P8Doz2rJkfxbc
44xXufwQ8PftX+BtduvBvxf8d6H438KCy87QvGUINvqMr7lxDPEmY3+Q58xW5wCSSdq838QPj58S
dIgi+Dv/AAUg/ZS0690XV51tIfGPhKB9S0aaV/lXfCwM9oST8r8tkjGOtekfBn4EaB+zh4IuPh54
S8T6zfaQNTmudNt9avvtB06JwuLWFyARCpUlQxY5duawzvHTpZYoVbtz+HnnGvTauryo17KcLXV4
TbTT7nxWbzmqLv8AJf5GD+0fffCbSfgz4jv/AI3ada3fhiDTpG1K2u4g4mUfdRBkEyFyoTBBDMME
HmvJP2U/h/471b9ixPAnxWM+3WtOvItLsb2UvcWmmTqy28MrEDLqjdcDAZRgFar/ABEnb9sz9pMf
CXT/AN78Ovhrfx3Xi2XrHq+sKcxWR7MkRyXHPdSPumvoC9WIRFAuOcAEV2qpWyTKKGBk71ZONaUX
qqaSXJG32ZSUnJ9bKKsfJ4ubwlONF/G2peitdfenr8uqPIP2NfE91rv7NvgnWrthJPZ6atnOXGcv
ayNbkEfWLvX1f+0B+0h8UfBnxAvvCvw31+z03RxBby2Sadp0IIWSBJMbtpzgsR+FfHX7FuyP4Ran
pSZMdl44123iAP8ACL+XA/WvtzUYPHHgbw14atPgv+z7ofiCyv8Aw3bXdxrlzoDX01xcSJukG4MN
mCR8pzjOO1fMcdwwWH4mUqtKNT3qqjGbio3bUm+aV0pLl91csnJN2WhtgFi2sXQw1WVOzhJuKlKW
jlFLljZ8r5velzJJpdz5k8WeINd8W6xP4g8R6jJd3twQZ7mVss5AA5/AD8MVzs0ZC5YepH516f8A
tBX/AMStQ8SWt98UPAdv4fu2sQttaW2li0V4g7ENsHXkkZ9gO1eY3Eibgm7jHSvsMirrEYOlNKKu
lpFqSSWiScUk0kuiXY/OM3oToYypGTb13aabb1babbTbfdn2r/wS4SJfhL4kdQN58SHcfb7PHivR
P2Wii/8ABWXx7C43GX4RWLjI6AXUQOP0/IV5n/wSvkaT4deKIX6DXlP5wp/hXpX7OS+V/wAFdvFD
o2BJ8EYiyj21CEf5+tfC+D7a+ktjIrrCb/8AJabP3GNv+IeZK/8Ap9Ff+nV/mfc1sAIQAMVJTYgF
jAAp1f6Gq/U+gWwUUUUAc18G/wDkk/hf/sXLH/0njrpa5r4N/wDJJ/C//YuWP/pPHXS0AfIH/Ba6
CVv2Jr7XljJGieK9IvSQOi/alQn8N+aX492y6v8AADxpDaYlMvhG/eHafvt9mdh+fH516f8A8FCv
hbefGf8AY++Ifw90yEy3t14eln0+JOTJPARPGo+rRhfxrw/9lfx9pXxy/ZY8L+IZbgS/2h4cjs9T
APS4ij8i4X2G9W/DFfw79L7A16GJyXOUvcpVHF+t4zV/XlZhkDg+IMdg5PWvQi158spxl9yqRv5H
5q2skiEJjGFHBHtXTeC30EeKdNHijzP7Ma7j/tHySQwh3DeQQCc7c9qyvFfhfUvBXjLUvCGrxFLj
Tb2S2lDDnKMVz+OMj2IqTT5fKlSQqCBgkEcGvZryWLwfPTfxxvF3t8Sumn030fofzXQ/2TEck1rB
2afk9U1+Z9h+CPhz+zV4yfyvgV4L0nXpoYt0j65fakpX6qE2D8cV81ftTeE7+5svHvg+6i05Jr7T
r6HyNLmL20bzQPhUZucDcvXnjmvZde/bS8H6noUPhfRfgtHBp8SbVsk1h4LcnvmGFVVvXBz1ryrx
V4p0/wAYa5LrNl4XsNIikRVXTtOjKxIAuOASTk4yfU5r8r4UwGeZfmMsVi41FBpcrqTU3pJPWUXa
7W6UYpdZM/VOIMyyWphadPByhzxd3yQcU3ZbJq617zflFI4L9j/XB4g/Zq8CaojZ3eGLRHz2ZIlQ
j8CpFeq20hW4IHIDDHua8D/YjvD4d8DeIPg3cOwm8DeL7/TY4n6m2eU3ED/QpMMHvg17vbyKSWAy
etfV8T4VU83xEenM2vR6p/NNM8mqnTxtSz+02vRu/wCp4/8A8E7pl0G9+L/gMnC6R8XdVaFA2CIp
mjkQ+2RXmfiW5/Zou/i7fWfxx8Q+Ov2lPH2mXcoi8J+HdHlfStHw5UR/ZomECEcqxZnGVOVB5rv/
ANl25/4R39s346+E3+7d3WiapEp9JbQ7iPx4PutcR+0T8c5fh/8AFTxD4V8aftuaX8PtMN401t4X
+GPhhrjWZyyBi15ciMiCcqQclgCMetfZ4XD4itxLifZ3TrUqcvc5lJtxi3rCMqlr1LPkcV/NJaH2
GBqzeJlZbpf+kxe6i2dPqXjNvjDr1t+zH40/ZF0D4IeCILWHxD461S4v7JJI9BgkI8mQQIotTcTR
iPltxVZcDHNeuftEf8FJvGeg/CtZf2ZvgB41h8MXg+yj4p3PhC4OnaRbEbWvLe1VPMnVEJZGdUjO
0fM/Q/Gq6FJqsdr8OvjRonxi8Vw3lvHr/wAQtV8H2cmp6rBeyKDpNhczsCEFtaZmZT/y1uvlAA+X
1b4T/Gy+tfEcXh39n/8A4Kb+LNF8QCZQvgv9oPQHMcvzDERuZ0VkyeAELOOOhxVZxwrlFepQq1aS
rKl76hL2ro3bXNOUl7WalLljZzvFQSvG0mfVYavZK2x9P/Cjxh8GP2Rv+CZ3jT4vfAb46a7418Nf
2LqWraHq2v3XmPFdyRmLykUxoyBro7mVgX3vISSSTXgE3wd1C9/Zx+D/AOy8n7GnxM+JF14c8KJq
+sQJ4rbQvDF9d6jtupBdz7h9okjkYgICCm5wSRkV6d/wUb1m/vv2dfhr+zP4putGsbz4ieOtIsfE
40seRYxWkBF5qEyhsbYFaJW+YjggnnJrxj4p/Fb9nX4kfEbVrD4nftq/Fz4uhL2VNM8DfB3R7mDT
dPtNxEMLtar5dwQuB5gkJPc8ivkuFMFip4apmTc5zr16tW6U5Nxpp0qbvRVON/eqXvOknutdF6Ms
WuVJPS1lt+p6h4Z+Bv7ZPgjR0g8Ff8E9f2X/AA/aiMA6fM0k11jsrzrERIR0ySa8++M3hXR/s7Sf
tc/8EkLbTraP5j4w+Dd3DcS2pHSYraeVOoH3suSBjkGuMudP/wCCcXg+YX+q/Cj9pP4TMo48TXcW
sweUf7xbfN2IP3DxXqHw+8Y/tO+EtB/4Tr9k39qHSv2h/B8ABu/DHiq+ij1mAHnal2ORIVGds4U4
A+U17s447D1vrCjyyvZSmq9C/pWjXq015e1aXdHnYrFx5bP+vuNP9iXXPEmp6v5vwc/avh+JXwoW
1fdZeKVZtf8AD9z0ihZyoZlb5v8AWgYEeFHHOr+238fNe+F3gyx+H3wshF14+8b3h0vwjZgf6p2A
33TdgkSncSeMkZyAa9Nu9V8A/Djwtq3xZ1jwtpvhd7zT11LxTcLDCkm+OMszTyRjEzINy7snP8JO
efnb9lfQdd+OfxC1f9uL4ladJA+txmx+Hel3K/NpmiqSBKVP3ZJzlz/sscEqwr5zDLC4/M62d4mk
lRo2Si+W9Sp9lS5YxjN3u5uyvCKbjzHyWLqwnKVWesY7LvLov19D0X9n74H+Hv2evhRpnw10O4+1
SwKZtU1JxmS/vH+aadyeSWYnrnACjPFdLqk0cavJLIFVBuZj/CBzmr88xyZG7+przP8Aah+II+Gv
wM8W+M0kCzWukSrZepuZB5UIHrmR0GPessH9aznNFKq3KpVlr3u3a/z3t02WiPjas54jFJSesn97
euhxH7Eiyz/s+w+I3TB1vXdX1FVbuJL+cjp6gCvuf4c/AjxPqvhCzsfDnjr4n+FZGtEa4hktHFmZ
ioLugidMKWyRkZxjJPWvkr4CeDIPhl8H/CfgW/ik26To9rDeLF98sFBlxnuWLEZ9ea+stP8Ajb+z
j4w0iPwt8RvHWs6hpnlhIIPFWieZcQjGP3dzbHeD0zu3A/SvG8R8RmOJxrnhISlBzm24x59FezSt
JO6720ejPe4fllVbMsRLEzinooqUuVP3npfmjZPZtc2y0PEf2nfAXiP4beOYfDHij4hy+I7gWKyi
6mldmiUlhsO92I5XOMnr65rye527txPI6c12fxcs/AWl+P7+w+GOqSXuiRuv2G6mzukUqCeqqfvE
jkdq4mYF5FjUEknCqoySTwBivu+HKc6WVUXN3air+7y9Lt8v2d7Wu0mvM/Nc+nSlmdVwSinJ295y
0vZavf13Z9w/8EvNJks/gzrmtyDBuvEjKhzwVWCHn8yR+Fd9+yNAvij/AIKpfE/xPbvuj8PfDnTt
HkZTwJJpI7jafcBKn/Z68Lab+zz+zJp1n4wuo7H+zdMfUtcuJf8AlizlppN3+4Dt+iVq/wDBITwh
rut+AfG/7U/i3TJLW++K3iyW/s4pkw0enQs8duB7Dc4B7gKeQQa+a+j3ltTiHxozbiGkr0aalBSW
z5pKMbdNY07+jXc/dsZQeByTJMol8cf3s01slBt37e/O3r6H2VASYgW9KfTLZdsQUNnB60+v74Wx
66vYKKKKBnNfBv8A5JP4X/7Fyx/9J466Wua+Df8AySfwv/2Llj/6Tx10tAFa901LyNk37S3fbnFf
nR4r0e5/4Jl/tIapoHiiKRfg38QtXbUND1lIz5PhvU5SDJbS4+5Cx+6eQFA9HI/SCuY+J3w08JfF
bwvqHgfx/wCGLHWNH1KAxXdhfxB45F9wehB5BGCDyDmvj+OuCsp4+4dq5RmC9yezW8ZLaSfdP79n
o2eZj8JXlUp4vCSUK9Jtxb2d1aUZf3ZLR9Vo1qkfmv8At5fsz3PiWUftBfC+EX6SWyf2zbWZDmSM
L8l0m37424DY5wA3IDV8qWTjcAvII4NfZ/7P/wAO5vgx+258Qf2fPg3461ub4beD9EtXl0HV7pbl
LLUbjbIsMLsu9Iggk4zkled1fNn7V17oE37RfimDw3pFtY2lrqPkLDaxBFMiKqyPtHALOGbjA59c
k/xpktHNOFeJMRwZi6yrvCxUo1Y3XuOyUZp6qSTVrNq2nmfm3F+BweMwceIKcHSnUqTpzg7NSnFv
mlBr7Lae9m3tZaEXwo+GuvfFLVbjRvDk9sk9vbGbZcuwMuCBsQKp3Oc5C8ZAOOcA9f8AFz4D6/8A
BmbzdT1OCe0kvmhs12Ok7qBnzGRhhVJ+XOTkjjPWr/7Fvxv0f4Z+IDoniDVbiKC9vFlRZpUWygIR
xJJIxBcHYQBjjIGc13f7VH7THg7x54Rg0LwlqVyp1C1ilVrCRDHsEhDwzhlDIwKAgD0GchjXiZtm
nFMeMY4OnR/2eW8tNu/fT/M6csyzhp8ITxc63+0K9o36q2ltuq8tT4i1a7X4NftdWPiZ2aLRPifp
66ZfOBhYtXtAWtmYngebC7xgd2j/AD97tJyu5Gcjj8a8x+NPwwtPjJ8Mb7wS979lvCY7nSNQT79n
exN5kMynqCrgZweVyO9J+zV8Zb/4p+DJbTxZarZeKvDtx/ZvizTCQDBdpwXUdTHIAJEIyCGxk7TX
3+bUnmWVwxa+KmlCd97fYk+lre5fuoq92eZGosRho147x91/+2v0to/O3mc/4XkHh/8A4KUeILZi
AniL4V2tyDj70lveeXn3+QsK539p+D43fEf45Wvwa+Ff7Mdn/Z739tq2t+L9QmSG11dIUBijuJVj
LeVHMIy0ZLSyCDaFVSWq58Z/E2i/D/8Abw+GvjnxBq1vYWOo+DNb0+8vbqZYookhUXILsxAA68ni
tVv23PEPxDvZtH/ZR+A+s+ORE5il8R3Ug07SUcdlmlGZcEdFA6deRXsUIZhSxGHzDDUY1F9XSvOX
LCDTlTTk+aMW1y3Sk+z3SPpcPOrTdOrCKtydXZKzcd/RW+RN8IvgD/wUL+FOhXNh4Y+P/wAOkm1L
VJ9T1Oa78Nz3DX13M255JZSVLZAVRhQFVVA6V0t1qv7UPiHxFo3w2/bC/ZF8DfEfw9qOrQQjxL4P
m8xdMLSKBPLbXoDqFGCzIwACHk9KwIP+HnOrY1E698I9DBHyWC2N9clR2VnJ5bsSuB6Yqyf2mf20
PgjH9v8A2gf2dtM8SaDFk3niH4bXskklug+9I1pP+8fAznawArysT/a2OxMp3wtWt05JezqXtZcs
lKndrSyUndK1mj1cPjJye8ebydn+SL/x81u7+KH7emm6NpfgUeLIPhV8LNS1YeGjcpHHqF7qGLVb
RmkBQF4QcbhwpPHODc8D+GP+CjM2iR6b4I034PfBrQlGbPw9pejvqN1Cp7SsuyE/VRnI968B/Zn/
AGrPip8RPjp8WviR+zj8A77xXq3izxHBDZ65rlx9h03TtNtovKgErsNzSNuZjEu1unJr3H/hB/8A
gpB433X/AIj/AGrPCHgwyNn+z/C3gtb5V/2TJdtnA6cDPTmtMwy7GZFRo5bXlh6cacKa/fXnLm5e
af7qLkl78pWlKF/M7a2LdBckmvnqa+oa1/wVE+GaPfXg+F/xOsEUmbTraOfSNQlHpGzboBx/e/Ws
r9n3wn8A/i/8S2/aG8NfAzxL8M/HHhyZ7TxFo7wGwiu5JIz8sqxgRXac7w4wSyqWHQVk6v8AEz9v
P9m5ZNZ+Idjovxc8KwLuv7/w9px0/WLWPjdJ9nUmOUDP3Uye5IFanxd/bn8B2v7O8Pxb+D+pr4g1
HxLMmmeDtMjX97dapKdiQvGfmDITuZT1CgDllNee8DnVWh7PCUaT9u+T2uHbhB3+KNSHw/Dd2lCL
Su7ySOCrisVUgo0t5dYvT/t7sYH7S3iK+/az+O9p+x74Uu3/AOEX0FotV+KOoROQHUHdbaaCP4pC
CzDqAAR91gfd4IrLTbGHTNOhS3t7eJYoIYowqxooAVQB0AAwB2rzj9lj4Gf8KG+GaaZrWojUPE2t
XL6p4t1hm3Ne38py53d0X7q+wzgbjXoNxcBCSzDmvPzitQnKGX4P+BRuk/55X96f/b2yvtFJHzeY
4yLlyQfuR2831f8Al5epHeThB/rM8+leB/tEXKfF341eDf2drN/MtbO7TxT4sKjIW1tmItoX7Hzb
gocddsOemc+n/Fr4n+GvhN4D1P4g+ML0Q6fp1uZZSOWkJ4WNR/E7MQqjuSACOo89/Zu8D+JNN0vV
vjF8TLXyvFnjm6W+1O3cknT7dQVtrIZHHlxkbv8AbZ89sexkNH6jh55jLTlvGHS85K1/+3I3fq4n
lwl7KlLEPppH/E/0Svd97K57N4G8B618Stdbw34eubWK7MDyRC7lKrIVHCAgH5j0AxyRjOSM6nxr
/Zy8Q/CKwOvXuqQS2ZMEUaSK8dxI7QhpGETLwitlc568YzkVu/srfGTT/hn4zks9W1K5SDUp7eOG
NpI1tEk3/wCtmLAlQo6FeeTnoK779q/9qXwb4s+H7aH4R1+dpNQtpYYZ9NlR/lWZd6Th1DKrqilC
vJDZ6cV+e4jNOJqHF9DC0KN8PK15dLfE7vlvorqy/l22PWwmWcM1uFquJr1WsRFO0b9tFZc1nduO
rt59T5MvpFLZXnFfQ/7Df7KGoeKtZtvjX8RdM8jRrCQS6TZ3KEG8lU8Skf8APNTyD/EwHYHPzl/a
Js72G78tGaFw4WVcqxHYjuP8K+yP25vEHiLXf2avB/xD0jxJqWmeCrrULA+OdP0Rlinl0u52KwST
aSgQ5XaOGEgBBC4PvcX4jNKmKwOR4WoqP12bpOs38N+iS1UmnZO/zPI4MwmW82JzbFQdV4WKn7O2
ktbXd38Md2u13Z2sX/GV74j/AOCiPxSP7NHwYv5o/h3o17G/xN8Z2p/dTqrBhYW0nR2Yj5mHHy5+
6vz/AKGeDfB2jeDfCWmeEfClpFY6XpdjFaWFlBFtSGGNQqoBngBQBXN/AX4OfC74Q/DHSPB3wY0K
z07w7HbLNYw2mSsocBvNZzlpHbIJZiSSeT0x3sMflRCMDp6V/Xvhv4f5N4ccOU8swC85SerlLrJ9
Ne3Y/U8HQxVbETx+Nkp1qlrtfCo6tQj/AHVd2b1k25O10gjTy0CZ+tOoor789QKKKKAOa+Df/JJ/
C/8A2Llj/wCk8ddLXNfBv/kk/hf/ALFyx/8ASeOuloAKp3800bNtGRkY59quVTvZJfMaPZlNvXPW
qja5FRXSR+fP7Fsv/CSfEv45/EK5y9xq/wAW9Rt5XfqYoBtjXPoquQBXxn8ekuLX47+MLe5bLr4k
vD83YGZsfyr7P/ZcRvAX7UPx++CmpjZLb+PG1yyTGN9rfI0gYDuFAQE9MuK+cP8AgoT8NbrwF+0F
P4kW2xZeJrZLy3mAIUyqAkyfUMAx/wCugr/PWGIq4Hx9zzB4v46usb9UlCSS/wC3fyPznijCTxHh
jgcRDX2NSan6uc4tv/t7707nkNjOQyvxwa0rS5AQKQOuAPasCKbZg7cc9c1pWs6kKSuecmv0PEUG
29P6s/8AM/KcPVWl3b+kdfoHhzxBrunX2r6To8tza6ZEJNQnjT5IFJwNxPGSeg6nn0NeR/Gr4f8A
jHw34uj/AGkvgfp/2jxDaW6weIfD8bhR4isVIzH3AuE6xtgk428ggV9U/Cv4s6zq3wqu/h/4b8H6
PqOoJeWcOleHE0VZvO+V2nvpd2Sx/dhSScLvHAAGec+Jnwq8T+B9Nh8U+JZ9Ft7jUtSmt20XSpSx
tXQKzLgAooG4DarNgnHHSvkMt4kxeCzapTrQjHXlUHK/PFrVS9dfeXuprR8yTPvqWD+q4SGJwrlO
Ljefu6LXbtbbS/NqnZI+fNY+H37PH7deheFfiDrDSanYaDeyTLpjSGLEx2CS1uk5YFWRSUyOnJZT
z7dpFvpmj2MGlaXZQ21tbQiK2traIJHEgGAqqAAoA7Dj6V4f8QPgl4n0XxfN8bf2ddVt9J8STgHX
NGuiRp/iFB/DMB/q5v7sw5z971G98KP2n/B/j3V/+EE8VadceFPGFuv+meGNbxHKx7tA/wBy5j4O
GQ9OSBX0ubYHF47BqWFqyqUKd2qd3zUru700bV2/fWjWjSd0ROrKtRjKhJypx+y3rB7u62a7SWj8
j2SK5LFWOCcYBqRbiRGyAPesWG/+7hqsxXpC5ZuvvXxEsNLmstGZ0q6gloX9Mt9K0e3e20rTLe1S
SVpXjtoVRWdjlmIUDJJJJPfNWGvjtIU1li8Xdz+tK15HtPK/geaxnhHUnzTd35mzxcr3e5f+1Mw+
YD6V45pH7FvwX8PftFSftH6XpskOoNC7x6ShAs4byQbZLxEx8srJwSOMkt16enyXpU8Nx7mopNRy
Cd44HPNelgsRj8vpzhhqjhzpxlbS6e6f9afNiWPrUoycJNX0di1LdEqWOCfWsXxN4p0bwzo1x4g8
R6pDZWNnC013d3MoVIo1GSzE9BjmuS+L/wC0H8OfgzYRSeLtYZ767OzTtE06I3F9fP0CQwp8zEnj
Jwo7kV5zZ/Db4jftF6xaeM/2jdNOj+GraYTaP8OVm3+Y64KTaiwwJHwAwgHyrxnJyK9rLcj56KxG
MbhR2v8Aam/5YLq/PSKurmDi/Z+2rPkprr38ore/n8K6sh8JQa1+1h4/0/4veK9Nns/h/wCH7z7R
4L0W7XY+sXIJC6nPGeQi8mFG9S/Tg/SPhn4TeLvHGlrqmlSaZAk0zQ2EWoajFbvfSLjckKuRvIyB
xxk4znipfhZ8Lm8c35F3DNDp1taTTxQ2kI8++8lQWt7UHCtJyOOwycNjB6jxRrnwu8OeAfDt5e+H
9S1rSBd3T6G0t6LO8sZo3RprWbCMssZaRXDqFI3EcHIry894hnicVDB4CNuT3Yxir8qacrLmcU5T
1lJt30bW3Kd9PDe3p/WcTaFCKaim2la6u21GT3au0vistnc8d1q1vtLv59O1C0a3nt5GjnhlXayO
pwVI9QQQfese9uiGySMbcD6Vq+N/F+oeM/FGo+KtW2/adSvJbiYJwoLsTgewzgfSucuZAx3ycADu
a+pwFGs6MJVUlOyut0nZXS72baPgMbVpqrKMJc0Luzta6vpftok/Uju3D/M4HqDjNff/AIv8Jif/
AIJ23vhrxAmBH8NC0m8fddLTzFPsQQCK+Mf2dvhRqHxu+MujeBre3Y2bXAuNVkC5EdrH80hJ7ZAC
DP8AE6ivtX/goN4xHgv9l7VPCHhqLfq3iyaDw7oVjEPmkmuTsKgdeIw/44HcV+V+JWIrZnxhkeR4
L3qzrRnZdPeSi3bbTmfy8z9N8O8IsNw3mua4n+F7KUF5u2qX3qPzZ9L/APBPbxPqXiP9iz4YarrT
OZj4LsYmZzkt5cSxgn14Uc17ahyua4v9n74Yw/B/4J+EvhfFGD/YHhuzsHdW4d4oUVm/FgT+NdqB
gV/o3S/gxv2X5H3+W06tHAUoVN1GKfrbUKKKK0O4KKKKAOa+Df8AySfwv/2Llj/6Tx10tc18G/8A
kk/hf/sXLH/0njrpaACoZoRI5ypOTz+VTUUCaufCf/BRbwtffszftJeDv269BtJf+EfurdfC/wAS
ViGfLtZZAbe7YeiyBQzf7Ea/xcP/AGrfgbpH7SHwaNjos8Emp2iG/wBAvVcFWcjO0MOqSLxn12nn
FfXvxh+F/hP4weB9W+HnjrSVvtI1jT2tr61ccSIc9D2IOCCOQQCOQK+FPgNrXjL9kz4vy/sJ/Gy9
eaBYmuvhj4jugQuqacM/6KT082LGNvXAIxjYW/jb6Sfh7mFHF0eOcjT9vhre1S6wje0vO17TW/K0
9keZgfqeFxlbKsdG+Exr36QqtJW8lO3NFrT2ifWR8ET2uoaPqE+kaxaSW91azPDc28q7XjdWKspB
6EEEYqzaSkdWwMjFfW//AAUP/ZWF1bv8evAeln7VCg/4SO0hXmaMKMXAHdlGA3qAG7E18cWl4JPl
Zuc8AGuHhLibAcY5LDHYeye0o31jJLWL/R7Nan4LxPkGO4TzmeEr6xesZWspRb0av+K3T0OhsdUu
rCRpbC5kjkIKkxyFSQRgjII4xnvXufhX9onwjqp0/wAS/EOa/bUtF0uPS9FWCJZzbuQ3m6i3mALJ
IDtCofY5O2vneO4CAkE9avW16MZzgjqCKM4yLCZml7aPvK6ut7Pdapqz66arQvKc9xWWTcqTunq0
9VdbO2mq3Wtk9baI938U/D3QfiLqdr4t8La9pui2uuKlvo9vfwtbvq92ihZpkijDpbI8oYAEhQ3A
748R+LPwT8C/Eqybwx8W/BUNy1rI6wyzKY57WRG2kxSqQ0bBhj5Wxkdx177wV8eY/D2maXb6t4Is
NVvvD6svh/U7uaUGzLOXBZEO2XY5LLkZBPcDFet614k+GnxF+HdvPaXdtfTaLqU2h6Il3GFa+ubx
Lf8A0yRDyAJBcyjIGCy9CK+Ojjs44YxEYyjKVO6UZJ6xXM1HWF5Xa5E3K1tdOVJH2eHp4HOP9poV
FTrpc2nNG7snK10kre/ZRbT91fFK58UWfw3/AGmvhLsHwj+K1l4t0iPhNC8eKxuUXriO+hAZj2Ak
VgB3PWraftVeMvCY8r4s/syeNtKZSd91odumr2q4774G3Y/4DmvpD4hfDbwf4d8O6pqHh1Ne3aHq
f9ny6heRLJa306uUkC+Wv+jkEZUOTuAOOeKzNX+CnxJ0jV9C8PXGirNqHiC28/T7KGUFwQOUcEgK
44ypPGRnB4r6mPFOUZhRU8dRjrzK79yb5Y8zl7vuu0feblFu26T0OWcMdCXLUoqp8N5Qvf3pcqV4
+7dy93WLV9m1qeEW/wC3x+zHFJt1n4gz6ZKTzb6poV5A6/g0VPu/2+f2WFTbZ/FRLqRuFistKu5W
P0CxGvT9W0bV9OsobrV9KkignlkiiadDh5IiokXnupZQe/zCjwxoWp+ItWTRfCujefdzZ2QWsXOA
CSTjAAABOTwMEnpXT7bhuMHUdKfLFNt+0i1Zbu/sl997HG62HclTVKd20rXere28PyPJn/bDj8Rk
xfC/4C+PvEch/wBXP/YTWNq31luim0e+DUE1r+2J8Uz5er61oHw20mTJeHSh/amqlehUTOohiJ7M
qMR+dfQA+E3jJbi9j12CHS49NFu19cahMAkUc5xHLuXcXQ/3l3DkDvWxffBHS7PWLjwpB42F/qp8
Mtq2nLaWbLBdAIk4RGfmTMBkbgDlMc5rnq8S5LgJf7NRjezd3zVWklF360lZSi720TvqdsaOMcb0
MOlqkuZxve8kklK2rcWl7r1R4X8J/wBnT4dfDPUJdb8N6Peatr92D9u8RavO17qFyePvSt0H+yoU
eor23wV8LdC1iw0PUPFfjaDTLrxDO40G0lsHlhn2yGPEzhlMSM6svG49ScDk+ifDvXPBfgm3tv7B
Npoh1vQbXWtKubjU2sw1xbs0NzZy3By5iZ0aUKCNxUAH5sVwHjz4+aTofiObTPAmk6XqenW119t0
6bULN5Vsb2QK872xcg+UZcsqyA9Acc18vic9zviHGTp0KctF8baulqre8pRjq/hWrUZpNWR1TwmA
wVKOKzCvzydly2bXe6tJSenTaPNF2aujs/G/xI+D/hjwpc2Gn+B7nSXu5JDHa6RrRMuiazb4BYRy
ElBuKgSI2GQ8rkZrwr4i/EzxX8R9Rj1PxZqInkhiEcSxxLGijqSFUAAscsx7sxJ7YxNa1y81a/n1
TUrlpri5laWeZzlndiSxPuSSfxrNkuGYmRjX0eRcMYTK0pu8qlt5Pmte2zldrZapq9tb3d/k854k
xOZScV7sNrJKN7O92kkt9fK9uistxOuNzZBB6mqckpkfYiszMcIqjJJ9h3NNublSrZY+wzX0v/wT
t/Zkk8ea+vxu8Y6eH0rSpyujW8y5F1cqf9ZjusZ49C/+6RXrcQ57l/CeS1Mwxb0itF1lJ7RXm+/T
VvRHmZBkmN4mzaGBw28tW+iit5ei6/JdT3j9hn9nFfgR8Pj4h8V2gXxLrqJJfq4+a0hHKQZ7EZLN
6scfw0n7PXhqX9uH9tN/jO8Ek/w3+Ds72vh6RV/d6vrjY82df76RBV+hWMgkMwqt+1P498dfE/xr
pP7FPwAv2TxZ4vhZvEGrQ8roWkf8tZ3YfcdhlV6E7sDlkNfaf7PXwI8B/s2fCnR/hB8ObEwaZpNo
saBgN0rnl5XIHLsxZifU1xfRz8Psw4gzqrx/nsWpzb9jFq2jVnJeVvdj2tfqf0FmFLBy9jw/gV/s
uF5XUfSc1qoN9bS9+fnyrozuYMiFM5ztGc/SnUi/dH0pa/tlbHqBRRRTAKKKKAOa+Df/ACSfwv8A
9i5Y/wDpPHXS1zXwb/5JP4X/AOxcsf8A0njrpaACiiigArw39vD9knQv2tPhYnh+K/Ol+KdFm+3+
DfEMTFZNOvk5Q5HOxiAGA9ARyox7lUVxEZDxjIHGaxxGHo4ujKjVipRlo01dNPumcuNwtHG4WVGq
rp/1p5rdeZ8Lfso/G/VPjX4R1TwJ8UtHSw8d+E7ltI8baLOgGZlLL5wXoY5Ap6ZXO4DK7Sfhr9rr
4Jt+z98ar7w7ZQFNJvv9L0U44EDMfk/4C25fooPevuT/AIKIeBB+zD+0T4M/bn8NARabrF/F4a+J
EKfKkttLhbe6btlGABJ/uoMjJrxz/grV4ftpvCHg/wAXKF86LU57Qt/syRhz+GYyfzr+AsbwhX8J
/GdZdhb/AFHMIylFdItXdvWLVu/LKzPj+Ll/bfBFeOM1xWAcbSe84StZv1jq+nPF+R8dQXIcct3/
ACq0k3UvN+NYEF0UJBccH1q3DfvvIyMegNfrdShFto/AKOIfKpG7FdlDs3dRxVu21KS2lWVTtYEM
jA4II6GsOO9zkD+71qaK5UsCXBrgq4S6a7nfSxV2tT1Sz/aT+IdxPYP4kuLTVorG9F4sF5ZRj7Rc
KrLHLMyKGlZd2QWJz34JFdNY/tUrqepaH4i8TaIBq+iyas/23TYY4lkkuYNsblRgAiXDM3XHOM14
WtyuRubp7VIt2TwAP0r5yvwlk2IacqKW+118Sakt+t3f/JI+iw/E+bUY2jVbXu7+98LTjvfayt29
WeufHH4y+Gfiinh640bTpbaW2s5ZtchaMKj380m+Z0wT8rEA57E47cUPB3xI8KeGvidB4o0Sy1DQ
9M8poZIoJUv5F3xlWJEqKsqEk5QgZU4z3rzVbl1+bePyokvmAPr64pQ4awdLArCRTUOWSs3f4rt6
PR6vS6bXRk1c/wAbVx/1uTXPzRd0rfCopa7rRa2aTve1z2Xxv8cvANzcarZeGfDyvBq/hZNPvrmC
ySyWe7W4EyXCwIzqgUKq4B5wTxnFcZrHxX8R3s3h++s7j7HfeHdPW0s9QtXZZiqO7RknPBUOVGP4
QBXE/bGKk4pousjr+tVg+HMBg4pRjezvrrurPy1Vl8kZ47iDMMXJzlO17babfO/TTXv3ZveK/G3i
Xxpqh1vxXr91f3RQL51zLuIUdFGegHoOKx7m9YtgH9aqS3IjYAN196ry3jL94454r6GhgadGHJTV
orZJJWXyPHxGOlWqSnN3b63LU13kff8AY1Vnuii435qrcXisMg89KpzXjZKZ78mvRp0VFnnVsRz6
HU/DLwHq3xa+Iuj/AA70R/3+rXiQ78Z8tc5dyPRUBY/T3FfpB8WPiD4L/Y1/Z1Opabpokg0m0Sy0
DS4j+9vrphthhAAyzMwJY4zwxxXyF/wS20G01n9ou71O8RXfTfDk8tvkfcd5I48j32u4/Gvp/wAA
+GIf2tv+Ci0Wk6k4n8H/AAPt4L24gPMV5rs4Dw7ux8pcN3IeM/3iK/IM84bxXiT4s4Lheb/2WhBV
qvmm9fnJJRj25nY/cPDy+R8HVMyoW+tYqoqNN78tk9fSOspLZuCT3R63/wAE6v2Udc+DHgm/+LXx
hkF38TvHMi33iq7kIzaK3MdinJ2rEOCo43DAyFWvqUcCkCIOigfhS1/fWAwOGyzB08Lh4qNOCUYp
bJLRfgfd5fgqWXYSNCnqlu3u295N9W3q33Ciiiuw7AooooAKKKKAOa+Df/JJ/C//AGLlj/6Tx10t
c18G/wDkk/hf/sXLH/0njrpaACiiigAoIB6iiigDwX/gpr4G0/x7+wx8S9KvbUObXwnd6hAQMlZb
VPtCY/4FEB+NfB/jD9oT9ib4y/A34dab+0H8bZRfadpNld6rpWjRSSSNc/ZFR45WjjYqQxbIBDZ7
iv1Q+IPgnQfiP4P1HwN4p037ZpmrWM1nqFqZWQSwSoUdcqQRlSRwQfQisD4Yfsz/ALP/AMGNNj0z
4XfBzw7occagbtP0uNHY4Ayz43MxxyxJJ71+YeIPhjguP8VhK9XEToSw7k4yp8vN7yaaTlGVumq1
Pnsdl2YVMdUqUPZunVpqE41Iyknyy5l7sZRv6t/I/O/4eftHf8EnNDji0TQ9P0C2UYAuNa8LXEj/
AFMtxET19TXp+m/Db9g79oC3ePwZofgbW8rlv+EfmhhkUYzk/Zirr25r7e8RfDX4feLbFtM8UeCd
K1K3bO6G/sY5lOevDg14N8Xv+CVH7D3xN36jH8EbDw5fBt6al4Rc6bNG/wDfURYjLd/mU5r8Vzj6
LCqzeIy3PcTCrv78udfPl5Wzqp1c2w1P2c8Hha1P+VQdN28n76/A+XfiN/wS2+GOtQSXnw68Z3+h
SkHy4Lg/arcDsOSJB9dx4rwT4i/8E/P2k/h1I9xYeGotftFGVn0SfzGI/wCuTBXz9Aa+yNU/YG/b
Q+C++b9mb9rqTxFYQrmPw38T7Y3IZR/At0gLjjpwg4GTXOan+0x+098EyY/2n/2MPElrBDxNrvgb
bq1mB/z0ZYzmFP8AeOR6V+e43gv6QvAtRygqeY0FfbWdl56TT+bPn8fk3h7mTf1zC1MDU/mj71K/
/bnPBeslH5H5+6zo3iLwxdHTvFGhXmn3A4MF9btE/wCTAGqgu2ZciMcdccY/Ov0P0/8A4KI/sP8A
jWA6T4h+JdvZuD/pGm+ItEuITGfRhJGVP5msvXv22/8Agnv4IKXWga9oGo3rOBaQeHvD7z3EsnQK
hSLGT2ywzXn4fxF43b9hX4axCqt2tFSUb9Lfu/zbPna/h5wwo+1pZ5S9n5tX+X7yzfZJXPlr4G/s
nfGb443UU+laDLpej5Bn1rU4mjhVO5QHBlPsv5r1HefF/wD4J/8AjHQ9KXxl8DteXxhorwh0EEie
fx95k2nbMuf7pyOmD1r2yw8Jftff8FAivhzTvBur/CT4XXDouratrEfk61rMBPMUEP8AyyVlyCTx
g53Nyp6PxV/wT6+O/wCyfeyeK/2DfF66loeA+o/DLxbfloppAMNJa3DkeXI3UhiozjLEAKPu8PwP
4zZtlrzdKnQmvhwsvtR689S6tU7WtbZrU6KPDvDdPC+yhhqtejfWutJ3/wCnVJr3odJdXf3btWPz
s13TPEXhq/l0nXtEu7K5iOJbW7t2jkT6qwBH41mveOSDsI7dMV99aj+3Z8J9Ju18I/td/BfXfAGr
qcPa+KvDklzZyN3MMyRsHX/aCge561uaX+1X/wAE7tCjGtaP8RfA1lIAHDWunKso+gWMN+lfG43j
zjXJqjoY7hyuqke3NKL9Gqck79Dhh4fcN42o5UM7pKHVTXLOPrFyi16tJHw78P8A9nv43/FWRD4I
+G2qXcL9LyS3MUAHqZHwv619B/DD/glfr2opFqXxh8fxWURIZ9O0RfNkx6GVxtX8FcZ716pP/wAF
Hfgv4huzo/wJ8HeMfiLqRYxw2fhXwxcOpf3aRUwO5IBAHNa+leBP+Cnn7Rez7F4Z8O/BnQ5QT9s1
aZNS1V489ViTKIeejhWHrWGEoePvG8uXLcuWBoy+3U0fy51dfKC73PfwPDPhtlj5nUnmFT+WnFuH
/bzj7nznU8rDtG/Y4/ZF+DukHWtd8FaU0dvgz6p4mvTMpHYsJWES/goFcT8QPjf/AMEstLjl0PX5
PAczJw6aJoSTsvY/vLaI/kG4r2zwL/wSH+BVzq9v4m/aJ8XeJ/itrKASPP4o1dxarJ3McEbABf8A
ZYsAK+i/AP7NfwA+GFolr8P/AIKeFtFVM4Gm6HBCfrlVyT71+h5N9F3NsTbE59ntadXe1OUkk/8A
E27+qUfQ+oVbGVafssJl+Gw9PtKPO2vSKjH8ZrzPzi+CHxY/4JpfC/4pXPjv4WfGU6LPqGmvZy6Z
qBuY7QIzq+5Wmj3Kcr1aTGDjAxX0F/wRxt7XXvg743+L2Uubnxh8UtWvZLwYPmRAoI9p/uDLYHTk
9jX1T41+Bvwb+IemS6V44+FPh3WYJFIaHU9HhnU59nU1W+CvwF+FvwD8KTeDPhV4Mt9D0ufUJb06
dasxjjlkxvKAk7QSoOBgDsB0r9o4D8I8DwNntfM44uriZ1YQp3qtOSjB3S5lGN79b3astTjoZZmK
x1B1I0o0aXPJRpxlH3p2u+VuUVs9rPVnaUUUV+vH0gUUUUAFFFFABRRRQBzXwb/5JP4X/wCxcsf/
AEnjrpa5n4Nsp+E/hfDD/kXLHv8A9O8ddNkeooAKKMj1FGR6igAooyPUUZHqKACijI9RRkeooACA
eDTXiSRSjDg07I9RRkeooAiksraUYeP8QaY2l2TNueHJz3OasZHqKMj1FD1VhNKW5y3ir4I/B/x0
yv42+GOg6uyfcbU9JhnK/TepqPwr8Bvgp4FnN14K+E/h3SZT1l03RoYHP/AkUGutyPUUZHqKz9lS
vflRh9TwntPaezjzd7K/37lddMs0+7FjByOad9htcY8odamyPUUZHqKtRitkb2Rmax4N8LeIbN9O
1/QbW+t5Bh7e8gWRG+oYEGuRH7Jn7L4uTeD9njwUJSc+YPDFqCD658vivQcj1FGR6ip9nTveyMKm
EwtZ3qU1J+aT/Mz9N8J+HNFtEsNF0W2s4Il2xQ2kKxog9AFAAFW4rG1hOY4gMDAqXI9RRkeopqMU
7pG0YRgrRVkMW3iV96rzj1p4GOKMj1FGR6iqKskFFGR6ijI9RQAUUZHqKMj1FABRRkeooyPUUAFF
GR6ijI9RQAUUZHqKKAPzM+Fv/JOtB/7A1t/6KSt+iigAooooAKKKKACiiigAooooAKKKKACiiigA
ooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigD/9lQSwMEFAAGAAgAAAAhANxk1OUU
AQAAigEAAA8AAABkcnMvZG93bnJldi54bWxcUMtOwzAQvCPxD9YicaN282opdaqoPAoXRFskxM0k
zkPEdmWbJPD1OAE1gpM1uzOzM16uOlGjhmtTKUlhOiGAuExVVsmCwvP+9mIOyFgmM1YrySl8cgOr
+PRkyRaZauWWNztbIGcizYJRKK09LDA2ackFMxN14NLtcqUFsw7qAmeatc5c1NgjJMKCVdJdKNmB
r0uevu8+BIWH9O21aRJ2x+S22dzs1/61enqh9PysS64AWd7Zkfyrvs8oRNBXcTUgdvm6OpFpqTTK
t9xUXy78zzzXSiCtWgqubKrq4XX4Mc8Nt44VePNZOKyOo2ngEwK4t7Xqr3gKPT4yyWXo/1MHUTTz
wl6Nx1QDGL8w/gYAAP//AwBQSwMEFAAGAAgAAAAhAFhgsxu6AAAAIgEAAB0AAABkcnMvX3JlbHMv
cGljdHVyZXhtbC54bWwucmVsc4SPywrCMBBF94L/EGZv07oQkaZuRHAr9QOGZJpGmwdJFPv3Btwo
CC7nXu45TLt/2ok9KCbjnYCmqoGRk14ZpwVc+uNqCyxldAon70jATAn23XLRnmnCXEZpNCGxQnFJ
wJhz2HGe5EgWU+UDudIMPlrM5YyaB5Q31MTXdb3h8ZMB3ReTnZSAeFINsH4Oxfyf7YfBSDp4ebfk
8g8FN7a4CxCjpizAkjL4DpvqGkgD71r+9Vn3AgAA//8DAFBLAQItABQABgAIAAAAIQD0vmNdDgEA
ABoCAAATAAAAAAAAAAAAAAAAAAAAAABbQ29udGVudF9UeXBlc10ueG1sUEsBAi0AFAAGAAgAAAAh
AAjDGKTUAAAAkwEAAAsAAAAAAAAAAAAAAAAAPwEAAF9yZWxzLy5yZWxzUEsBAi0AFAAGAAgAAAAh
ALictV3KAgAA7gYAABIAAAAAAAAAAAAAAAAAPAIAAGRycy9waWN0dXJleG1sLnhtbFBLAQItAAoA
AAAAAAAAIQA1nFBX9GgAAPRoAAAVAAAAAAAAAAAAAAAAADYFAABkcnMvbWVkaWEvaW1hZ2UxLmpw
ZWdQSwECLQAUAAYACAAAACEA3GTU5RQBAACKAQAADwAAAAAAAAAAAAAAAABdbgAAZHJzL2Rvd25y
ZXYueG1sUEsBAi0AFAAGAAgAAAAhAFhgsxu6AAAAIgEAAB0AAAAAAAAAAAAAAAAAnm8AAGRycy9f
cmVscy9waWN0dXJleG1sLnhtbC5yZWxzUEsFBgAAAAAGAAYAhQEAAJNwAAAAAA==
">
   <v:imagedata src="sp1_files/sp1_1618_image001.png" o:title=""/>
   <o:lock v:ext="edit" aspectratio="f"/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]-->
                        <![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:12px;margin-top:15px;width:101px;
  height:100px'><img width=101 height=100 src="sp1_files/sp1_1618_image002.gif" alt=DU v:shapes="Picture_x0020_5"></span>
                        <![endif]><span style='mso-ignore:
  vglayout2'>
                            <table cellpadding=0 cellspacing=0>
                                <tr>
                                    <td colspan=9 height=125 class=xl631618 width=576 style='height:93.75pt;
    width:432pt'>YAYASAN PONDOK PESANTREN DARUL ULUM<br>
                                        <font class="font51618"><span style='mso-spacerun:yes'>&nbsp;</span>MADRASAH
                                            ALIYAH (MA) DARUL ULUM</font>
                                        <font class="font71618"><br>
                                            NSM. 131235120071 / NPSN. 69975838<br>
                                            KECAMATAN KAPONGAN KABUPATEN SITUBONDO</font>
                                    </td>
                                </tr>
                            </table>
                        </span>
                    </span></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td colspan=9 height=20 class=xl651618 style='height:15.0pt'><span lang=IN><span lang=IN>Alamat : Jl. Cermee NO 12 , Kapongan<span style='mso-spacerun:yes'>&nbsp;
                            </span>&nbsp; Situbondo Telp. 82251719459<span style='mso-spacerun:yes'>&nbsp;
                            </span>Kode Pos 68362</span></span></td>
            </tr>
            <tr height=60 style='mso-height-source:userset;height:45.0pt'>
                <td colspan=9 height=60 class=xl681618 width=576 style='height:45.0pt;
  width:432pt'><span lang=IN><span lang=SV>Surat Peringatan Pertama (SP
                            1)<br>
                            Nomor : 018.a/MA.DU/I/2023</span></span></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl691618 colspan=4 style='height:15.0pt'><span lang=EN-US>Dalam hal ini ditujukan kepada :</span></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
            </tr>
            <tr height=21 style='mso-height-source:userset;height:15.75pt'>
                <td height=21 class=xl691618 style='height:15.75pt'><span lang=EN-US>Nama</span><span lang=IN></td>
                <td class=xl151618></td>
                <td colspan=7 class=xl701618></span><span lang=EN-US>: <font class="font61618"><?php echo $name; ?></font></span></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl691618 style='height:15.0pt'><span lang=IN>Kelas</td>
                <td class=xl151618></td>
                <td colspan=7 class=xl701618></span><span lang=EN-US>: <?php if ($kelas == 1) {
                                                                            echo ('X');
                                                                        }
                                                                        if ($kelas == 2) {
                                                                            echo ('XI');
                                                                        }
                                                                        if ($kelas == 3) {
                                                                            echo ('XII');
                                                                        }  ?></span></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl151618 style='height:15.0pt'></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
            </tr>
            <tr height=125 style='mso-height-source:userset;height:93.75pt'>
                <td colspan=9 height=125 class=xl731618 width=576 style='height:93.75pt;
  width:432pt'><span lang=IN><span lang=SV style='mso-ansi-language:SV;
  mso-bidi-font-size:11pt'><span lang=IN><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </span>Sehubungan dengan laporan dan pantauwan kami selaku kepala sekolah MA
                                DARUL ULUM dengan sikap tidak disiplin/pelanggaran terhadap tata tertib
                                Sekolah<span style='mso-spacerun:yes'>&nbsp; </span>yang di lakukan oleh siswa
                                yang bersangkutan karena jarang sekali tidak masuk dan ketika di kasi sanksi
                                siswa menolak .dengan hal ini kami memberikan surat permohonan untuk
                                memberikan teguran dan bimbingan kepada yang bersangkutan dan Dalan hal ini
                                di berlakukan sebagai surat peringatan ke 1 ( sp 1 )</span></span></span></td>
            </tr>
            <tr height=61 style='mso-height-source:userset;height:45.75pt'>
                <td colspan=9 height=61 class=xl731618 width=576 style='height:45.75pt;
  width:432pt'><span lang=IN>&#7443; Jika siswa tersebut tetap tidak menaati
                        peraturan kedisiplinan Sekolah, maka surat SP-1 ini akan berlanjut ke
                        SP-2.<br>
                        &#7443; Surat SP1 ini berlaku hingga 2 minggu.</span></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl151618 style='height:15.0pt'></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
            </tr>
            <tr height=50 style='mso-height-source:userset;height:37.5pt'>
                <td colspan=9 height=50 class=xl731618 width=576 style='height:37.5pt;
  width:432pt'><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span>Demikian surat peringatan pertama ini dibuat agar dapat diperhatikan
                        dan ditaati sebaik mungkin oleh yang bersangkutan.</span></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl151618 style='height:15.0pt'></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl151618 style='height:15.0pt'></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl151618 colspan=2 style='height:15.0pt'>Dikeluarkan
                    oleh,</td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618 colspan=2>Diketahui oleh,</td>
                <td class=xl151618></td>
                <td class=xl151618></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl151618 colspan=2 style='height:15.0pt'>KA Kesiswaan</td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618 colspan=3>Kepala MA Darul Ulum</td>
                <td class=xl151618></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl151618 style='height:15.0pt'></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl151618 style='height:15.0pt'></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl151618 style='height:15.0pt'></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl721618 colspan=3 style='height:15.0pt'><span style='font-variant-ligatures: normal;font-variant-caps: normal;orphans: 2;
  widows: 2;-webkit-text-stroke-width: 0px;text-decoration-thickness: initial;
  text-decoration-style: initial;text-decoration-color: initial'>Imroatus
                        Sholihah, S.Pd</span></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl721618 colspan=2><span style='font-variant-ligatures: normal;
  font-variant-caps: normal;orphans: 2;widows: 2;-webkit-text-stroke-width: 0px;
  text-decoration-thickness: initial;text-decoration-style: initial;text-decoration-color: initial'>Moh
                        Ramli, S.Pd</span></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl151618 style='height:15.0pt'>NIP :</td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618>NIP.</td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl151618 style='height:15.0pt'></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl751618 style='height:15.0pt'>&nbsp;</td>
                <td class=xl751618>&nbsp;</td>
                <td class=xl751618>&nbsp;</td>
                <td class=xl751618>&nbsp;</td>
                <td class=xl751618>&nbsp;</td>
                <td class=xl751618>&nbsp;</td>
                <td class=xl751618>&nbsp;</td>
                <td class=xl751618>&nbsp;</td>
                <td class=xl751618>&nbsp;</td>
            </tr>
            <tr height=80 style='mso-height-source:userset;height:60.0pt'>
                <td colspan=9 height=80 class=xl711618 width=576 style='height:60.0pt;
  width:432pt'>Saya, <?php echo $name; ?> telah membaca dan memahami maksud yang tersebut
                    dalam Surat Teguran ini, dan saya menyadari konsekuensi yang akan saya terima
                    bilamana saya masih melakukan pelanggaran yang sama atau lainnya dimasa yang
                    akan datang.</td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl151618 style='height:15.0pt'></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl151618 colspan=2 style='height:15.0pt'>Tanda Tangan</td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl151618 style='height:15.0pt'></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl151618 style='height:15.0pt'></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl151618 style='height:15.0pt'></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
            </tr>
            <tr height=20 style='height:15.0pt'>
                <td height=20 class=xl151618 colspan=2 style='height:15.0pt'><?php echo $name; ?></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
                <td class=xl151618></td>
            </tr>
            <![if supportMisalignedColumns]>
            <tr height=0 style='display:none'>
                <td width=64 style='width:48pt'></td>
                <td width=64 style='width:48pt'></td>
                <td width=64 style='width:48pt'></td>
                <td width=64 style='width:48pt'></td>
                <td width=64 style='width:48pt'></td>
                <td width=64 style='width:48pt'></td>
                <td width=64 style='width:48pt'></td>
                <td width=64 style='width:48pt'></td>
                <td width=64 style='width:48pt'></td>
            </tr>
            <![endif]>
        </table>

    </div>


    <!----------------------------->
    <!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
    <!----------------------------->
</body>

<script>
    window.print();
</script>

</html>