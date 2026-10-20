<?php
    require "connection.php";

    $msg = "";
    $num = 0;
    $crtf = "";
    $title = "Certificate Verification";

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $id = $_POST['id'];

        $sql = "SELECT * FROM `cirtificate` WHERE Enroll_No = '$id'";

        $res = mysqli_query($con, $sql);
        $num = mysqli_num_rows($res);

        if ($num > 0)
        {
            $row = mysqli_fetch_assoc($res);

            $title = "$row[Stu_name] - Verified Certificate";

            if ($row['grade'] == 'A++') $crtf = "Certificate/A++ Certificate.png";
            else if ($row['grade'] == 'A+') $crtf = "Certificate/A+ Certificate.png";
            else if ($row['grade'] == 'A') $crtf = "Certificate/A Certificate.png";
            else if ($row['grade'] == 'B+') $crtf = "Certificate/B+ Certificate.png";
            else if ($row['grade'] == 'B') $crtf = "Certificate/B Certificate.png";
            else if ($row['grade'] == 'C') $crtf = "Certificate/C Certificate.png";
            else if ($row['grade'] == 'F') $crtf = "Certificate/F Certificate.png";
            else $crtf = "Certificate/Coding Club Certificate.png";

            $msg = "<svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
                <symbol id='check-circle-fill' fill='currentColor' viewBox='0 0 16 16'>
                    <path
                        d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z' />
                </symbol>
            </svg>
            <div class='alert alert-primary text-center' role='alert'>
                <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'>
                    <use xlink:href='#check-circle-fill' />
                </svg>
                Verified!
            </div>
            ";
        }
        else
        {
            $msg = "<svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
                <symbol id='exclamation-triangle-fill' fill='currentColor' viewBox='0 0 16 16'>
                    <path
                        d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z' />
                </symbol>
            </svg>
 
            <div class='alert alert-danger text-center' role='alert'>
                <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Warning:'>
                    <use xlink:href='#exclamation-triangle-fill' />
                </svg>
                    Not Found!
            </div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $title; ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="preload" href="<?php echo $crtf; ?>" as="image">

    <style>
        #my-main-container {
            display: none;
            justify-content: center;
            align-items: center;
            width: 100%;
            box-sizing: border-box;
            margin: 48px 0px 12px 0px;
        }

        #my-container {
            width: min(75vw, 1200px);
            height: auto;
            aspect-ratio: 297 / 210;
            border: 1px solid #c3c3c3;
            position: relative;
            overflow: hidden;
            background-image: url("<?php echo $crtf; ?>");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            margin: 16px auto;

        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            #certificateArea {
                display: none !important;
            }
            .webCfrt{
                display: none !important;
            }

            #my-main-container {
                margin: 0;
                display: flex !important;
            }

            #my-container {
                width: 80%;
                height: auto;
                aspect-ratio: 297/210;
                page-break-inside: avoid;
                margin: 0;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .field {
                position: absolute;
                font-weight: 500 !important;
            }

            .enrollNo {
                font-size: 13px !important;
                top: 3%;
                left: 83%;
                font-size: 18px;
            }

            .name {
                top: 41.8%;
                left: 28%;
                font-size: 32px;
            }

            .father {
                top: 51.8%;
                left: 24%;
                font-size: 16px;
                font-weight: normal;
            }

            .from1 {
                top: 52%;
                left: 53%;
                font-size: 16px;
                font-weight: normal;
            }

            .complete {
                top: 58.6%;
                left: 44%;
                font-size: 16px;
                font-weight: normal;
            }

            .from2 {
                top: 65.8%;
                left: 33.5%;
                font-size: 15px;
                font-weight: normal;
            }

            .to {
                top: 65.8%;
                left: 52%;
                font-size: 15px;
                font-weight: normal;
            }

            .grade2 {
                top: 65.8%;
                left: 72.5%;
                font-size: 15px;
                font-weight: normal;
            }

            #print-btn {
                display: none;
            }

            @page {
                size: A4 landscape;
                margin: 25mm 10mm;
            }
        }
    </style>
</head>

<body>

    <!-- -------------------------------- Message ----------------------------------------- -->

    <div class="row m-0 p-0" id="print-btn">
        <div class="col-sm-12 p-0">
            <?php echo $msg; ?>
        </div>
    </div>

    <!-- ---------------------------- Verification Form ----------------------------------- -->

    <div class="row m-0 p-0" id="print-btn">
        <div class="col-sm"></div>
        <div class="col-sm-8 bg-light col-md-7 col-lg-6 border-start border-5 border-danger rounded-3 px-4 mt-4 mb-4 shadow">
            <h2 class="text-center p-3 text-danger">Certificate Verification</h2>

            <form method="post">
                <input type="text" name="id" placeholder="Enter Enrollment No. eg : CCA/2025"
                    class="form-control mb-4" />
                <input type="submit" value="Verify" class="btn form-control bg-danger text-white mb-4" />
            </form>

        </div>
        <div class="col-sm"></div>
    </div>

    <?php if ($num > 0) { ?>

    <!-- ---------------------------------Web View Certificate ----------------------- -->

    <div class="row m-0 p-0 webCfrt">
        <div class="col-sm"></div>
        <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6 border border-2 border-gray rounded py-4 p-lg-4 py-sm-4 mt-5 mb-4 shadow bg-light">

            <div class="container certificate" id="certificateArea">
                <div class="certificate-border text-center">
                    <div class="text-end text-muted fw-medium">Enroll No:
                        <?php echo $row['Enroll_No'] ?>
                    </div>

                    <img src="https://img.icons8.com/color/48/source-code.png" class="logo" alt="logo">
                    <h2 class="cert-title">CODING CLUB</h2>
                    <h5 class="sub-title">AZAMGARH PRIVATE LIMITED</h5>
                    <p>(An ISO 9001:2015 Certified Company)</p>
                    <p><em>Founded by Technocrat from IT Industry</em></p>

                    <div class="cert-tag">CERTIFICATE</div>
                    <hr/>
                    <div class="text-start mt-4">
                        <p>This is to certify that Mr./Ms./Mrs <span class="line">
                                <?php echo $row['Stu_name'] ?>
                            </span></p>
                        <p>S/o.D/o.W/o <span class="line">
                                <?php echo $row['parent_name'] ?>
                            </span> from <span class="line">
                                <?php echo $row['clg_name'] ?>
                            </span></p>
                        <p>has successfully completed the <span class="line">
                                <?php echo $row['clg_name'] ?>
                            </span> course</p>
                        <p>in our organization from <span class="line">
                                <?php echo $row['from_date'] ?>
                            </span> to <span class="line">
                                <?php echo $row['to_Date'] ?>
                            </span> with <span class="grade">
                                <?php echo $row['grade'] ?>
                            </span> grade.</p>
                        <p>We wish him/her great success in the future.</p>
                    </div>

                    <div class="row mt-5">
                        <div class="col-sm-6 text-center">
                            <img src="Certificate/Project Manager Signature.png" height="75"><br>
                            <div class="signature-line">Project Manager</div>
                        </div>
                        <div class="col-sm-6 text-center">
                            <img src="Certificate/Founder Singnature.png" height="70"><br>
                            <div class="signature-line">CEO & Founder</div>
                        </div>
                    </div>

                    <div class="footer-contact text-center mt-4">
                        📧 codingclubazm@gmail.com | 📞 +91 6306696861 | 🌐 <a
                            href="https://www.codingclub.pro">www.codingclub.pro</a><br>
                        Verify this certificate at: <a
                            href="https://www.codingclub.pro/verify">codingclub.pro/verify</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm"></div>
    </div>

    <!-- ------------------------------------------- Printing Part ----------------------------------- -->
    <div id="my-main-container">
        <div id="my-container">

            <span class="field enrollNo  fs-xxl-6" id="enrollNo">
                <?php echo $row['Enroll_No'] ?>
            </span>

            <span class="field name" id="name">
                <?php echo $row['Stu_name'] ?>
            </span>

            <span class="field father" id="father">
                <?php echo $row['parent_name'] ?>
            </span>

            <span class="field from1" id="from1">
                <?php echo $row['clg_name'] ?>
            </span>

            <span class="field complete" id="complete">
                <?php echo $row['clg_name'] ?>
            </span>

            <span class="field from2" id="from2">
                <?php echo $row['from_date'] ?>
            </span>

            <span class="field to" id="to">
                <?php echo $row['to_Date'] ?>
            </span>

            <span class="field grade2" id="grade2">
                <?php echo $row['grade'] ?>
            </span>

        </div>
    </div>

    <!-- ------------------------------------- Print Button -------------------------- ------- -->

    <div class="row m-0 p-0">
        <div class="col-sm-12 p-0 text-center">
            <button onclick="window.print()" class="btn btn-primary mt-4 mb-5" id="print-btn">Print Certificate</button>
        </div>
    </div>

    <?php } ?>

</body>

</html>