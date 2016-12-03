jQuery(function($) {

	$(window).load(function(){
        	$('main-nav').addClass('berubah');
	});

	//#main-slider
	var slideHeight = $(window).height();
	$('#home-slider .item').css('height',slideHeight);

	$(window).resize(function(){'use strict',
		$('#home-slider .item').css('height',slideHeight);
	});

	//Scroll Menu
	$(window).on('scroll', function(){
        if($('#asd').html()=="home" || $('#asd').html()==" Index " || $('#asd').html()!="FilterBy")
        {
            if( $(window).scrollTop()>slideHeight ){
            $('.img-responsive').addClass('perubahanUkuran');
						$('.main-nav').addClass('navbar-fixed-top berubah');
            $('.navbar-right > li').addClass('berubah');

            } else {

                $('.img-responsive').removeClass('perubahanUkuran');
                $('.main-nav').removeClass('navbar-fixed-top berubah');
                $('.navbar-right > li').removeClass('berubah');
            }
        }
	});

	// Contact form
	var form = $('#main-contact-form');
	form.submit(function(event){
		event.preventDefault();
		var form_status = $('<div class="form_status"></div>');
		$.ajax({
			url: $(this).attr('action'),
			beforeSend: function(){
				form.prepend( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Email is sending...</p>').fadeIn() );
			}
		}).done(function(data){
			form_status.html('<p class="text-success">Thank you for contact us. As early as possible  we will contact you</p>').delay(3000).fadeOut();
		});
	});

	//Google Map
	if($('#asd').html()==" Index ")
	{
		var latitude = $('#google-map').data('latitude')
		var longitude = $('#google-map').data('longitude')
		function initialize_map() {
			var myLatlng = new google.maps.LatLng(latitude,longitude);
			var mapOptions = {
				zoom: 14,
				scrollwheel: false,
				center: myLatlng
			};
			var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
			var contentString = '';
			var infowindow = new google.maps.InfoWindow({
				content: '<div class="map-content"><ul class="address">' + $('.address').html() + '</ul></div>'
			});
			var marker = new google.maps.Marker({
				position: myLatlng,
				map: map
			});
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
			});
		}
		google.maps.event.addDomListener(window, 'load', initialize_map);
	}
});

/*EDITANKU*/
$(".displayPictureMenu").on('click',function()
                            {
		$rowid = $(this).attr('row-id');
		//alert('asd');
		if($(".R"+$rowid).css('display')=='block')$(".R"+$rowid).css('display','none');

    else $(".R"+$rowid).css('display','inherit');
});

$(".links").on('click',function(event)
{
	event = event || window.event;
	var target = event.target || event.srcElement,
			link = target.src ? target.parentNode : target,
			options = {index: link, event: event},
			links = this.getElementsByTagName('a');
	blueimp.Gallery(links, options);
});

/*document.getElementById('links').onclick = function (event) {
    event = event || window.event;
    var target = event.target || event.srcElement,
        link = target.src ? target.parentNode : target,
        options = {index: link, event: event},
        links = this.getElementsByTagName('a');
    blueimp.Gallery(links, options);
};*/


$('#modalRating').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var recipient = button.data('whatever'); // Extract info from data-* attributes
	var valueBintang = button.data('val');
	var judul = $("#ratingJudul").html();
	var deskripsi = $("#ratingDeskripsi").html();
	$("#recipient-name").val(judul);
	$("#message-text").val(deskripsi);
	$("#hidBintang").attr("value",valueBintang);

	$('.bintang').each(function(index,value)
	{
		if($(this).hasClass('glyphicon-star'))
		{
			$(this).removeClass('glyphicon-star');
			$(this).addClass('glyphicon-star-empty');

		}
	});
	//tambah Bintang
	$(".bintang").each(function(index,value)
	{
		if($(this).attr('data-val')<=valueBintang)
		{
			$(this).removeClass('glyphicon-star-empty');
			$(this).addClass('glyphicon-star');
		}
	});
});

$('.bintang').on('click', function (event) {
	var valueBintang = $(this).attr("data-val");
	$('.bintang').each(function(index,value)
	{
		if($(this).hasClass('glyphicon-star'))
		{
			$(this).removeClass('glyphicon-star');
			$(this).addClass('glyphicon-star-empty');

		}
	});
	//tambah Bintang
	$(".bintang").each(function(index,value)
	{
		if($(this).attr('data-val')<=valueBintang)
		{
			$(this).removeClass('glyphicon-star-empty');
			$(this).addClass('glyphicon-star');
		}
	});
	$("#hidBintang").attr("value",valueBintang);
});

$('#modalUpload').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var recipient = button.data('menu'); // Extract info from data-* attributes
	var restoran = button.data('restoran');
	var kodeMenu = button.data('kodemenu');
	var kodeRestoran = button.data('koderestoran');
  var modal = $(this);
  modal.find('.modal-title').text("Upload Foto " + recipient + " Restoran "+ restoran);
	$("#hidKodeMenu").attr("value",kodeMenu);
	$("#hidKodeRestoran").attr("value",kodeRestoran);
});

$('#modalReport').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var restoran = button.data('restoran');
	var review = button.data('review');
	$("#kodeRestoranReport").attr("value",restoran);
	$("#kodeReviewReport").attr("value",review);
	if($("#report"+review).hasClass("sudahdiKlik") == true){
		$("#modalReport").modal('toggle');
	}
});

$('#reportReview').on('click', function () {
  var restoran = $("#kodeRestoranReport").val();
  var review = $("#kodeReviewReport").val();
	var deskripsi = $("#txtDeskripsi").val();
	var urlnya = $("#urlReview").val();
	$.ajax({
				url: urlnya,
				type: "POST",
				data: {kodeRestoran: restoran, kodeReview: review,deskripsiReport: deskripsi},
				success: function(response) {
					$("#modalReport").modal('toggle');
					$("#txtDeskripsi").val("");
					$("#report" + review).addClass("sudahdiKlik");
				}
	});
});

$(".likeReview").on("click",function(){
	var kodeReview = $(this).attr("data-review");
	var kodeUser = $(this).attr("data-user");
	var kodeRestoran = $(this).attr("data-restoran");
	var urlnya = $(this).attr("data-url");
	if($("#btnLike"+kodeReview).hasClass("sudahdiKlik") == false){
		$("#btnLike" + kodeReview).addClass('sudahdiKlik');
		$("#btnDislike" + kodeReview).removeClass('sudahdiKlik');
		$.ajax({
					url: urlnya,
					type: "POST",
					data: {user: kodeUser, review: kodeReview,restoran: kodeRestoran},
					dataType: "JSON",
					success: function(response) {
						document.getElementById("like"+kodeReview).innerHTML=response[0];
						document.getElementById("dislike"+kodeReview).innerHTML=response[1];
					}
		});
	}
});

$(".dislikeReview").on("click",function(){
	var kodeReview = $(this).attr("data-review");
	var kodeUser = $(this).attr("data-user");
	var kodeRestoran = $(this).attr("data-restoran");
	var urlnya = $(this).attr("data-url");
	if($("#btnDislike"+kodeReview).hasClass("sudahdiKlik") == false){
		$("#btnLike" + kodeReview).removeClass('sudahdiKlik');
		$("#btnDislike" + kodeReview).addClass('sudahdiKlik');
		$.ajax({
					url: urlnya,
					type: "POST",
					data: {user: kodeUser, review: kodeReview,restoran: kodeRestoran},
					dataType: "JSON",
					success: function(response) {
						document.getElementById("like"+kodeReview).innerHTML=response[0];
						document.getElementById("dislike"+kodeReview).innerHTML=response[1];
					}
		});
	}
});

$(".reportReview").on("click",function()
{
	var kodeReview = $(this).attr("data-review");
	var kodeUser = $(this).attr("data-user");
	var url = $(this).attr("data-url");
});

$(".btnUpdate").on("click",function()
{
	var para = document.createElement("textarea");
	var node = document.createTextNode($(this).attr("data-val"));
	para.appendChild(node);

	var element = document.getElementById($(this).attr("data-val2"));
	document.getElementById($(this).attr("data-val2")).innerHTML='';
	element.appendChild(para);

	document.getElementById($(this).attr("id")).style.display = "none";
	document.getElementById($(this).attr("id")+'2').style.display = "inherit";

	para.setAttribute('id','textarea');
	para.setAttribute('value','');
});

$(".btnUpdate2").on("click",function()
{
	var target = document.getElementById("textarea");
	var targetValue = document.getElementById("textarea").value;
	var url = $(this).attr('data-url');
	var namaIdComment = $(this).attr("data-val2");
	var idBtn2 = $(this).attr("id");
	var idBtn1 = idBtn2.substring(0,6);
	$.post(url,{ deskripsi: targetValue},
  function(result){
			//alert("Success");
			document.getElementById(namaIdComment).innerHTML=targetValue;
			document.getElementById(idBtn2).style.display = "none";
			document.getElementById(idBtn1).style.display = "inherit";
  });
});

$(".btnStatus").on("click",function()
{
	var statusRestoran = $(this).attr("value");
	var url = $(this).attr("data-url");
	var kodeResto = $(this).attr("data-val");
	var id = $(this).attr("id");
	//alert(id);
	$.post(url,{ status: statusRestoran, kode: kodeResto},
	function(result){
		alert(result);
		document.getElementById(id).value=result;
		document.getElementById(id).innerHTML = result;
	});
});

$('#modalUpdate').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget);
	var menu = button.data('menu');
	var kodeMenu = button.data('kode');
	var kodeResto = button.data('koderesto');
	var deskripsiMenu = button.data('deskripsi');

	var modal = $(this);
	//alert(kodeMenu);
	modal.find('.modal-title').text("Update Menu " + menu );
	//alert($('#txtMenuu').val());
	modal.find('#txtMenu').val( menu );
	modal.find('#hKodeMenu').val( kodeMenu );
	modal.find('#hKodeRestoran').val( kodeResto );

	modal.find('#deskripsiMenu').val( deskripsiMenu );
	//$("#hidKodeMenu").attr("value",kodeMenu);
	//$("#hidKodeRestoran").attr("value",kodeRestoran);
});

$('#modalUpdatePromo').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget);
	var promo = button.data('namapromo');
	var kodePromo = button.data('kodepromo');
	var deskripsiPromo = button.data('deskripsipromo');
	var masaBerlaku = button.data('masaberlaku');
	var persentasePromo = button.data('persentasepromo');
	var keteranganPromo = button.data('keteranganpromo');
	var kodeResto = button.data('koderesto');
	var fotoPromo = button.data('fotopromo');

	var modal = $(this);
	modal.find('.modal-title').text("Update Promo " + promo );
	//alert($('#txtMenuu').val());
	modal.find('#txtPromo').val( promo );

	modal.find('#deskripsiPromo').val( deskripsiPromo );
	modal.find('#hKodeRestoran').val( kodeResto );
	modal.find('#hKodePromo').val( kodePromo );
	modal.find('#hFotoPromo').val( fotoPromo );
	modal.find('#masaBerlaku').val( masaBerlaku );
	modal.find('#persentasePromo').val( persentasePromo );
	modal.find('#keteranganPromo').val( keteranganPromo );
	//$("#hidKodeMenu").attr("value",kodeMenu);
	//$("#hidKodeRestoran").attr("value",kodeRestoran);
});
