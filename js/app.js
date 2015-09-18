function HeightBackground(){ 
 	height = $(window).height(); 
 	$("#photo").css({ 'height': height }) 
} 

$(document).ready(function(){ 
 	HeightBackground(); 
 	$(window).resize(function(){ 
 		HeightBackground(); 
 	}) 
 	$(window).scroll(function(){ 
 		ShrinkNavbar(); 
 		OpacityContent(); 
 	}) 
}) 

function Heightcontent(){ 
 	height = $(window).height(); 
 	$("#fond").css({ 'height': height }) 
}