<?php
//session_start();
$role = $_SESSION['role'];

if (!isset($_SESSION['role'])) {
    header('Location: login.php');
}


$id = $_GET['id'];

require_once "model/project_model.php";
$row = getOnePR($id);


$dateTime = new DateTime($row['created_At']);
$day = $dateTime->format('d');
$month = $dateTime->format('M');
$year = $dateTime->format('Y');

$date =  "$day $month $year";

$array = explode(",", $row['tags']);
$tags = array_map("trim", $array);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title><?= $row['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
        }

        .blog-listing {
            padding-top: 30px;
            padding-bottom: 30px;
        }

        .gray-bg {
            background-color: #f5f5f5;
        }

        /* Blog 
---------------------*/
        .blog-grid {
            box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
            border-radius: 5px;
            overflow: hidden;
            background: #ffffff;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .blog-grid .blog-img {
            position: relative;
        }

        .blog-grid .blog-img .date {
            position: absolute;
            background: #fc5356;
            color: #ffffff;
            padding: 8px 15px;
            left: 10px;
            top: 10px;
            border-radius: 4px;
        }

        .blog-grid .blog-img .date span {
            font-size: 22px;
            display: block;
            line-height: 22px;
            font-weight: 700;
        }

        .blog-grid .blog-img .date label {
            font-size: 14px;
            margin: 0;
        }

        .blog-grid .blog-info {
            padding: 20px;
        }

        .blog-grid .blog-info h5 {
            font-size: 22px;
            font-weight: 700;
            margin: 0 0 10px;
        }

        .blog-grid .blog-info h5 a {
            color: #20247b;
        }

        .blog-grid .blog-info p {
            margin: 0;
        }

        .blog-grid .blog-info .btn-bar {
            margin-top: 20px;
        }


        /* Blog Sidebar
-------------------*/
        .blog-aside .widget {
            box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
            border-radius: 5px;
            overflow: hidden;
            background: #ffffff;
            margin-top: 15px;
            margin-bottom: 15px;
            width: 100%;
            display: inline-block;
            vertical-align: top;
        }

        .blog-aside .widget-body {
            padding: 15px;
        }

        .blog-aside .widget-title {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .blog-aside .widget-title h3 {
            font-size: 20px;
            font-weight: 700;
            color: #fc5356;
            margin: 0;
        }

        .blog-aside .widget-author .media {
            margin-bottom: 15px;
        }

        .blog-aside .widget-author p {
            font-size: 16px;
            margin: 0;
        }

        .blog-aside .widget-author .avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            overflow: hidden;
        }

        .blog-aside .widget-author h6 {
            font-weight: 600;
            color: #20247b;
            font-size: 22px;
            margin: 0;
            padding-left: 20px;
        }

        .blog-aside .post-aside {
            margin-bottom: 15px;
        }

        .blog-aside .post-aside .post-aside-title h5 {
            margin: 0;
        }

        .blog-aside .post-aside .post-aside-title a {
            font-size: 18px;
            color: #20247b;
            font-weight: 600;
        }

        .blog-aside .post-aside .post-aside-meta {
            padding-bottom: 10px;
        }

        .blog-aside .post-aside .post-aside-meta a {
            color: #6F8BA4;
            font-size: 12px;
            text-transform: uppercase;
            display: inline-block;
            margin-right: 10px;
        }

        .blog-aside .latest-post-aside+.latest-post-aside {
            border-top: 1px solid #eee;
            padding-top: 15px;
            margin-top: 15px;
        }

        .blog-aside .latest-post-aside .lpa-right {
            width: 90px;
        }

        .blog-aside .latest-post-aside .lpa-right img {
            border-radius: 3px;
        }

        .blog-aside .latest-post-aside .lpa-left {
            padding-right: 15px;
        }

        .blog-aside .latest-post-aside .lpa-title h5 {
            margin: 0;
            font-size: 15px;
        }

        .blog-aside .latest-post-aside .lpa-title a {
            color: #20247b;
            font-weight: 600;
        }

        .blog-aside .latest-post-aside .lpa-meta a {
            color: #6F8BA4;
            font-size: 12px;
            text-transform: uppercase;
            display: inline-block;
            margin-right: 10px;
        }

        .tag-cloud a {
            padding: 4px 15px;
            font-size: 13px;
            color: #ffffff;
            background: #20247b;
            border-radius: 3px;
            margin-right: 4px;
            margin-bottom: 4px;
        }

        .tag-cloud a:hover {
            background: #fc5356;
        }

        .blog-single {
            padding-top: 30px;
            padding-bottom: 30px;
        }

        .article {
            box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
            border-radius: 5px;
            overflow: hidden;
            background: #ffffff;
            padding: 15px;
            margin: 15px 0 30px;
        }

        .article .article-title {
            padding: 15px 0 20px;
        }

        .article .article-title h6 {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .article .article-title h6 a {
            text-transform: uppercase;
            color: #fc5356;
            border-bottom: 1px solid #fc5356;
        }

        .article .article-title h2 {
            color: #20247b;
            font-weight: 600;
        }

        .article .article-title .media {
            padding-top: 15px;
            border-bottom: 1px dashed #ddd;
            padding-bottom: 20px;
        }

        .article .article-title .media .avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            overflow: hidden;
        }

        .article .article-title .media .media-body {
            padding-left: 8px;
        }

        .article .article-title .media .media-body label {
            font-weight: 600;
            color: #fc5356;
            margin: 0;
        }

        .article .article-title .media .media-body span {
            display: block;
            font-size: 12px;
        }

        .article .article-content h1,
        .article .article-content h2,
        .article .article-content h3,
        .article .article-content h4,
        .article .article-content h5,
        .article .article-content h6 {
            color: #20247b;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .article .article-content blockquote {
            max-width: 600px;
            padding: 15px 0 30px 0;
            margin: 0;
        }

        .article .article-content blockquote p {
            font-size: 20px;
            font-weight: 500;
            color: #fc5356;
            margin: 0;
        }

        .article .article-content blockquote .blockquote-footer {
            color: #20247b;
            font-size: 16px;
        }

        .article .article-content blockquote .blockquote-footer cite {
            font-weight: 600;
        }

        .article .tag-cloud {
            padding-top: 10px;
        }

        .article-comment {
            box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
            border-radius: 5px;
            overflow: hidden;
            background: #ffffff;
            padding: 20px;
        }

        .article-comment h4 {
            color: #20247b;
            font-weight: 700;
            margin-bottom: 25px;
            font-size: 22px;
        }

        img {
            max-width: 100%;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }

        /* Contact Us
---------------------*/
        .contact-name {
            margin-bottom: 30px;
        }

        .contact-name h5 {
            font-size: 22px;
            color: #20247b;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .contact-name p {
            font-size: 18px;
            margin: 0;
        }

        .social-share a {
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 50%;
            color: #ffffff;
            text-align: center;
            margin-right: 10px;
        }

        .social-share .dribbble {
            box-shadow: 0 8px 30px -4px rgba(234, 76, 137, 0.5);
            background-color: #ea4c89;
        }

        .social-share .behance {
            box-shadow: 0 8px 30px -4px rgba(0, 103, 255, 0.5);
            background-color: #0067ff;
        }

        .social-share .linkedin {
            box-shadow: 0 8px 30px -4px rgba(1, 119, 172, 0.5);
            background-color: #0177ac;
        }

        .contact-form .form-control {
            border: none;
            border-bottom: 1px solid #20247b;
            background: transparent;
            border-radius: 0;
            padding-left: 0;
            box-shadow: none !important;
        }

        .contact-form .form-control:focus {
            border-bottom: 1px solid #fc5356;
        }

        .contact-form .form-control.invalid {
            border-bottom: 1px solid #ff0000;
        }

        .contact-form .send {
            margin-top: 20px;
        }

        @media (max-width: 767px) {
            .contact-form .send {
                margin-bottom: 20px;
            }
        }

        .section-title h2 {
            font-weight: 700;
            color: #20247b;
            font-size: 45px;
            margin: 0 0 15px;
            border-left: 5px solid #fc5356;
            padding-left: 15px;
        }

        .section-title {
            padding-bottom: 45px;
        }

        .contact-form .send {
            margin-top: 20px;
        }

        .px-btn {
            padding: 0 50px 0 20px;
            line-height: 60px;
            position: relative;
            display: inline-block;
            color: #20247b;
            background: none;
            border: none;
        }

        .px-btn:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            border-radius: 30px;
            background: transparent;
            border: 1px solid rgba(252, 83, 86, 0.6);
            border-right: 1px solid transparent;
            -moz-transition: ease all 0.35s;
            -o-transition: ease all 0.35s;
            -webkit-transition: ease all 0.35s;
            transition: ease all 0.35s;
            width: 60px;
            height: 60px;
        }

        .px-btn .arrow {
            width: 13px;
            height: 2px;
            background: currentColor;
            display: inline-block;
            position: absolute;
            top: 0;
            bottom: 0;
            margin: auto;
            right: 25px;
        }

        .px-btn .arrow:after {
            width: 8px;
            height: 8px;
            border-right: 2px solid currentColor;
            border-top: 2px solid currentColor;
            content: "";
            position: absolute;
            top: -3px;
            right: 0;
            display: inline-block;
            -moz-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }
    </style>
</head>

<body>
    <div class="blog-single gray-bg">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <article class="article">
                        <div class="article-img">
                            <img src="https://www.bootdey.com/image/800x350/87CEFA/000000" title alt>
                        </div>
                        <div class="article-title">

                            <h6><a href="#"><?= $row['category_name'] ?> </a></h6>

                            <h2><?= $row['title'] ?></h2>
                            <div class="media">
                                <div class="avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" title alt>
                                </div>
                                <div class="media-body">
                                    <label><?= $row['firstname'] ?> <?= $row['lastname'] ?></label>
                                    <span><?php echo $date ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="article-content">
                            <p><?= $row['Description'] ?></p>
                        </div>

                    </article>



                    <?php if ($_SESSION['role'] == 'freelancer') :  ?>
                        <div class="contact-form article-comment">
                            <h4>Send A proposal</h4>
                            <form id="proposal-form" method="POST">
                                <input name="freelancerID" type="hidden" value="<?php echo $_SESSION['ID'] ?>" />
                                <input name="projectID" type="hidden" value="<?php echo $id  ?>" />



                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="Name" id="name" placeholder="Name *" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" id="message" placeholder="Your message *" rows="4" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="send">
                                            <button type="submit" class="px-btn theme"><span>Submit</span> <i class="arrow"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div id="successMsg" style="margin-top: 3rem; display:none;" class="alert alert-success" role="alert">
                                Sent successfully!
                            </div>

                            <div id="errorMsg" style="margin-top: 3rem; display:none;" class="alert alert-danger" role="alert">
                               Rquest Failed
                            </div>

                        </div>
                    <?php endif;  ?>




                </div>

                <div class="col-lg-4 m-15px-tb blog-aside">

                    <!-- <div class="widget widget-author">
                        <div class="widget-title">
                            <h3>Author</h3>
                        </div>
                        <div class="widget-body">
                            <div class="media align-items-center">
                                <div class="avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" title alt>
                                </div>
                                <div class="media-body">
                                    <h6>Hello, I'm<br> Rachel Roth</h6>
                                </div>
                            </div>
                            <p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores</p>
                        </div>
                    </div> -->


                    <div class="widget widget-post">
                        <div class="widget-title">
                            <h3>About the Job</h3>
                        </div>
                        <div class="widget-body">
                            <div class="card border shadow-none">

                                <div class="card-body p-4 pt-2">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>Hourly</td>
                                                    <td class="text-end">$<?= $row['minprice'] ?> - $<?= $row['maxprice'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Duration</td>
                                                    <td class="text-end"><?= $row['duration'] ?> Days</td>
                                                </tr>
                                                <tr>
                                                    <td>Hours per week</td>
                                                    <td class="text-end"><?= $row['hours'] ?>h</td>
                                                </tr>
                                                <tr>
                                                    <td>Experince Required</td>
                                                    <td class="text-end"><?= $row['experince'] ?></td>
                                                </tr>
                                                <tr class="bg-light">
                                                    <td>Location</td>
                                                    <td class="text-end"><?= $row['country'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- <div class="widget widget-latest-post">
                        <div class="widget-title">
                            <h3>Latest Post</h3>
                        </div>
                        <div class="widget-body">
                            <div class="latest-post-aside media">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                    </div>
                                    <div class="lpa-meta">
                                        <a class="name" href="#">
                                            Rachel Roth
                                        </a>
                                        <a class="date" href="#">
                                            26 FEB 2020
                                        </a>
                                    </div>
                                </div>
                                <div class="lpa-right">
                                    <a href="#">
                                        <img src="https://www.bootdey.com/image/400x200/FFB6C1/000000" title alt>
                                    </a>
                                </div>
                            </div>
                            <div class="latest-post-aside media">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                    </div>
                                    <div class="lpa-meta">
                                        <a class="name" href="#">
                                            Rachel Roth
                                        </a>
                                        <a class="date" href="#">
                                            26 FEB 2020
                                        </a>
                                    </div>
                                </div>
                                <div class="lpa-right">
                                    <a href="#">
                                        <img src="https://www.bootdey.com/image/400x200/FFB6C1/000000" title alt>
                                    </a>
                                </div>
                            </div>
                            <div class="latest-post-aside media">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                    </div>
                                    <div class="lpa-meta">
                                        <a class="name" href="#">
                                            Rachel Roth
                                        </a>
                                        <a class="date" href="#">
                                            26 FEB 2020
                                        </a>
                                    </div>
                                </div>
                                <div class="lpa-right">
                                    <a href="#">
                                        <img src="https://www.bootdey.com/image/400x200/FFB6C1/000000" title alt>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> -->


                    <div class="widget widget-tags">
                        <div class="widget-title">
                            <h3>Tags</h3>
                        </div>
                        <div class="widget-body">
                            <div class="nav tag-cloud">
                                <?php foreach ($tags as $tag) : ?>
                                    <a href="#"><?php echo $tag ?></a>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        let proposalForm = document.getElementById("proposal-form");
        let alert = document.getElementById("successMsg");
        let erroralert = document.getElementById("errorMsg");
        

        proposalForm.addEventListener("submit", (e) => {

            e.preventDefault();

            let freelancerId = e.target.freelancerID.value;
            let projectID = e.target.projectID.value;
            let name = e.target.name.value;
            let message = e.target.message.value;


            submitData(freelancerId, name, message, projectID)

        })


        async function submitData(freelancerId, name, message, projectID) {
            const formData = new FormData();
            formData.append("freelancerId", freelancerId);
            formData.append("name", name);
            formData.append("message", message);
            formData.append("projectID", projectID);

            try {
                const response = await fetch("http://peoplepertask_backend_auth.test/proposal.php", {
                    method: "POST",
                    body: formData,
                   
                });

                if (!response.ok) {
                    erroralert.style.display = 'block'
                    throw new Error(`Error: ${response.status} - ${response.message}`);
                   
                }

                if (response.ok) {
                    alert.style.display = 'block'
                    proposalForm.remove();
                }


                const responseData = await response.json();
                 console.log(responseData.message);


            } catch (error) {
                console.error(error);
            }
        }
    </script>
</body>

</html>