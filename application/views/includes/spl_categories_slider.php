<section class="whitebg">
<div class="container">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="welcome">Our <span class="b-color">Specials:</span></div>
<div class="img-slider">
 
	
<div class="carousel slide carousel-slide " data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
<div class="carousel-inner">
<!---Start -->
<?php
$url=base_url().'home/Welcome/ourspecialsList';
$ch = curl_init();
$timeout = 5;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$statistics_req = curl_exec($ch);
curl_close($ch);
$statistics_res = json_decode($statistics_req);

?>
<?php 
if($statistics_res->code==SUCCESS_CODE){
    $m_sno=1;
    foreach($statistics_res->menu_result as $m_res){
       // print_r($m_res);
?>
<div class="item <?php echo ($m_sno==1)?'active':''; ?>">
<div class="col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="<?php echo $m_res->menu_image_path; ?>" class="img-responsive"></a></div>
</div>
<?php $m_sno++; } } ?>
<!---Start end-->
</div>

<a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
<a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
</div>
</div>
</div>
	

<div class="clearfix"></div>
</div>	
</section>