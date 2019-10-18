<?php
include("database.php");

// Registrations count
$qry = "SELECT COUNT(*) as reg FROM `users`";
$res = mysqli_fetch_assoc(mysqli_query($db, $qry));
$reg = $res['reg'];

// Certificates
$qry = "SELECT COUNT(*) as certi FROM `enrolledcourses` WHERE percomp=100";
$res = mysqli_fetch_assoc(mysqli_query($db, $qry));
$certified = $res['certi'];

// Ongoing projects
$qry = "SELECT COUNT(*) as ongoing_proj FROM `projects` WHERE percomp<>100";
$res = mysqli_fetch_assoc(mysqli_query($db, $qry));
$ongoing_proj = $res['ongoing_proj']; 

// Completed projects
$qry = "SELECT COUNT(*) as completed_proj FROM `projects` WHERE percomp=100";
$res = mysqli_fetch_assoc(mysqli_query($db, $qry));
$completed_proj = $res['completed_proj']; 

?>

<!DOCTYPE html>
<html>

<head>
    <title>TPM solutions</title>

    <link rel="stylesheet" href="index.css">
    <style type="text/css">
        body
		{
			background-color: rgba(238, 238, 238, 1) !important;  
		}
    </style>
</head>

<body>
    <?php include ("header.php"); ?>

    <div class="start_img"><img id="topimg" src=""></div>

    <div class="services fadeonscroll">
        <div class="services-heading"><p>Services</p></div>
        <div class="row" style="margin: 15px;">
            <div class="col-md-4">
                <div class="card">
                    <p class="c_title">Training</p>
                    <p class="c_data">
                        The students are provided with a list of courses. They can choose any course and get the certificate after the course period.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <p class="c_title">Certification</p>
                    <p class="c_data">The students who have completed the courses will be provided the certificates. Those who have atleast one certificate will be given projects.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <p class="c_title">Projects</p>
                    <p class="c_data">The managers will tender for projects and those projects are assigned to those students who are eligible for the project. These projects are done by on-field and off-field employees. </p>
                </div>
            </div>
        </div>
    </div>
    <p class="statistics-heading">statistics</p>
    <div class="container">
        <div class="row statistics fadeonscroll">
            <div class="col-sm-3">
                <p class="registrations incrAnim"><?php echo $reg; ?></p>
                <p class="statistics-description">Registrations</p>
            </div>
            <div class="col-sm-3">
                <p class="certified incrAnim"><?php echo $certified; ?></p>
                <p class="statistics-description">Students Certified</p>
            </div>
            <div class="col-sm-3">
                <p class="projects-onprogress incrAnim"><?php echo $ongoing_proj; ?></p>
                <p class="statistics-description">Projects on progress</p>
            </div>
            <div class="col-sm-3">
                <p class="projects-completed incrAnim"><?php echo $completed_proj; ?></p>
                <p class="statistics-description">projects completed</p>
            </div>
        </div>
    </div>

    <!-- <?php #include("footer.php"); ?> -->
    <div class="footer"><p>Copyrights@Database Hackers 2019</p></div>

    <script type="text/javascript">
        var t=0;
		var imgs=["tr1.jpg","tr2.jpg"];
		$("#topimg").attr('src',"images/"+imgs[t]);
		var slide= () => {
			$("#topimg").attr('src',"images/"+imgs[(++t)%imgs.length]);
		};
		var inter=setInterval(slide,3000);
		// $("#topimg").hover(() => {
		// 	clearInterval(inter);
		// });
		// $("#topimg").mouseleave(() => {
		// 	inter=setInterval(slide,3000);
		// });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
		    $(window).scroll( function(){
		        $('.fadeonscroll').each( function(i){
		            var bottom_of_object = $(this).offset().top + $(this).outerHeight()*(5/8);
		            var bottom_of_window = $(window).scrollTop() + $(window).height();
		            if( bottom_of_window > bottom_of_object ){
		                $(this).animate({'opacity':'1'},500);
		            }
		        });
		    });
		});
		$(document).ready(function() {
		    $(window).scroll( function(){
		        $('.incrAnim').each( function(i){
		            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
		            var bottom_of_window = $(window).scrollTop() + $(window).height();
		            if( bottom_of_window > bottom_of_object ){
		            	new incrAnimC($('.incrAnim')[i],2000);
		            }
		        });
		    });
		});
        		
		class incrAnimC {
			constructor(elem,time) {
				this.elem = elem;
				this.time = time;
				this.actual = $(elem).text();
				this.animate();
			}
			animate() {
				if($(this.elem).attr('data-anim')) return;
				$(this.elem).attr('data-anim',true);
				this.now = 0;
				$(this.elem).text(this.now);
				if(this.actual==0)return;
				var anim = setInterval(() => {
					// this.now= this.now>this.actual?this.actual:this.now+(this.time/this.actual);
					$(this.elem).text(++this.now);
					if(this.actual==this.now) {
						clearInterval(anim);
						$(this.elem).attr('data-anim',false);
					}
				},(this.time/this.actual));
			}

		}
    </script>

</body>

</html>