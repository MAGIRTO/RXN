<?php 

/**
  *	Editor Xtended - Animate It!
  * Copyright (C) 2014 eLEOPARD Design Studios Pvt Ltd. All rights reserved

  * This program is free software: you can redistribute it and/or modify
  * it under the terms of the GNU General Public License as published by
  * the Free Software Foundation, either version 3 of the License, or
  * (at your option) any later version.

  * This program is distributed in the hope that it will be useful,
  * but WITHOUT ANY WARRANTY; without even the implied warranty of
  * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  * GNU General Public License for more details.

  * You should have received a copy of the GNU General Public License
  * along with this program.  If not, see <http://www.gnu.org/licenses/>.

  * For any other query please contact us at contact[at]eleopard[dot]in
**/
?>

<?php
	define( '_JEXEC', 1 );
	defined('_JEXEC') or die;	 
	$ih_name = addslashes( $_GET['ih_name'] ); 
	
?>
<html>
	<head>
		<link href='//fonts.googleapis.com/css?family=Roboto:400,100,400italic,700italic,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="assets/animate.min.css" />
		<link rel="stylesheet" href="assets/style.css" />
		
	</head>	
	<body>
		<header class="site__header island">
			<div class="wrap">
		   		<span id="animationSandbox" style="display: block;"><h1 class="site__title mega animateit-icon"> </h1></span>
		    	<span class="beta subhead">Select your animation style:</span>
		  	</div>
		</header>
		<main class="site__content island" role="content">
			<div class="wrap">			
				<form name = "edsanimate_form" id = "edsanimate_form">
					<table width="600" cellspacing="15" cellpadding="15">
					<tr>
						<td>Animation Style: </td>
						<td>
							<select id="eds_style" name= "eds_style" class="input input--dropdown js--animations">
								<optgroup label="Attention Seekers">
						          <option value="bounce">bounce</option>
						          <option value="flash">flash</option>
						          <option value="pulse">pulse</option>
						          <option value="rubberBand">rubberBand</option>
						          <option value="shake">shake</option>
						          <option value="swing">swing</option>
						          <option value="tada">tada</option>
						          <option value="wobble">wobble</option>
						        </optgroup>
						
						        <optgroup label="Bouncing Entrances">
						          <option value="bounceIn">bounceIn</option>
						          <option value="bounceInDown">bounceInDown</option>
						          <option value="bounceInLeft">bounceInLeft</option>
						          <option value="bounceInRight">bounceInRight</option>
						          <option value="bounceInUp">bounceInUp</option>
						        </optgroup>
						
						        <optgroup label="Bouncing Exits">
						          <option value="bounceOut">bounceOut</option>
						          <option value="bounceOutDown">bounceOutDown</option>
						          <option value="bounceOutLeft">bounceOutLeft</option>
						          <option value="bounceOutRight">bounceOutRight</option>
						          <option value="bounceOutUp">bounceOutUp</option>
						        </optgroup>
						
						        <optgroup label="Fading Entrances">
						          <option value="fadeIn">fadeIn</option>
						          <option value="fadeInDown">fadeInDown</option>
						          <option value="fadeInDownBig">fadeInDownBig</option>
						          <option value="fadeInLeft">fadeInLeft</option>
						          <option value="fadeInLeftBig">fadeInLeftBig</option>
						          <option value="fadeInRight">fadeInRight</option>
						          <option value="fadeInRightBig">fadeInRightBig</option>
						          <option value="fadeInUp">fadeInUp</option>
						          <option value="fadeInUpBig">fadeInUpBig</option>
						        </optgroup>
						
						        <optgroup label="Fading Exits">
						          <option value="fadeOut">fadeOut</option>
						          <option value="fadeOutDown">fadeOutDown</option>
						          <option value="fadeOutDownBig">fadeOutDownBig</option>
						          <option value="fadeOutLeft">fadeOutLeft</option>
						          <option value="fadeOutLeftBig">fadeOutLeftBig</option>
						          <option value="fadeOutRight">fadeOutRight</option>
						          <option value="fadeOutRightBig">fadeOutRightBig</option>
						          <option value="fadeOutUp">fadeOutUp</option>
						          <option value="fadeOutUpBig">fadeOutUpBig</option>
						        </optgroup>
						
						        <optgroup label="Flippers">
						          <option value="flip">flip</option>
						          <option value="flipInX">flipInX</option>
						          <option value="flipInY">flipInY</option>
						          <option value="flipOutX">flipOutX</option>
						          <option value="flipOutY">flipOutY</option>
						        </optgroup>
						
						        <optgroup label="Lightspeed">
						          <option value="lightSpeedIn">lightSpeedIn</option>
						          <option value="lightSpeedOut">lightSpeedOut</option>
						        </optgroup>
						
						        <optgroup label="Rotating Entrances">
						          <option value="rotateIn">rotateIn</option>
						          <option value="rotateInDownLeft">rotateInDownLeft</option>
						          <option value="rotateInDownRight">rotateInDownRight</option>
						          <option value="rotateInUpLeft">rotateInUpLeft</option>
						          <option value="rotateInUpRight">rotateInUpRight</option>
						        </optgroup>
						
						        <optgroup label="Rotating Exits">
						          <option value="rotateOut">rotateOut</option>
						          <option value="rotateOutDownLeft">rotateOutDownLeft</option>
						          <option value="rotateOutDownRight">rotateOutDownRight</option>
						          <option value="rotateOutUpLeft">rotateOutUpLeft</option>
						          <option value="rotateOutUpRight">rotateOutUpRight</option>
						        </optgroup>
						
						        <optgroup label="Specials">
						          <option value="hinge">hinge</option>
						          <option value="rollIn">rollIn</option>
						          <option value="rollOut">rollOut</option>
						        </optgroup>
						
						        <optgroup label="Zoom Entrances">
						          <option value="zoomIn">zoomIn</option>
						          <option value="zoomInDown">zoomInDown</option>
						          <option value="zoomInLeft">zoomInLeft</option>
						          <option value="zoomInRight">zoomInRight</option>
						          <option value="zoomInUp">zoomInUp</option>
						        </optgroup>
						
						        <optgroup label="Zoom Exits">
						          <option value="zoomOut">zoomOut</option>
						          <option value="zoomOutDown">zoomOutDown</option>
						          <option value="zoomOutLeft">zoomOutLeft</option>
						          <option value="zoomOutRight">zoomOutRight</option>
						          <option value="zoomOutUp">zoomOutUp</option>
						        </optgroup>
							</select>
							
						</td>
						<td width="150">
							<button class="butt js--triggerAnimation button-animate-it">Animate it</button>
						</td>						
						</tr>
						<tr>
							<td>Delay (in seconds): </td>
							<td colspan="2">
								<select id="eds_delay" name="eds_delay" class = "input input--dropdown">
									<option value="">None</option>
									<option value="delay1">0.5 </option>
							        <option value="delay2">1.0 </option>
							        <option value="delay3">1.5 </option>
							        <option value="delay4">2.0 </option>
							        <option value="delay5">2.5 </option>
							        <option value="delay6">3.0 </option>
							        <option value="delay7">3.5 </option>
							        <option value="delay8">4.0 </option>
							        <option value="delay9">4.5 </option>
							        <option value="delay10">5.0 </option>
							        <option value="delay11">5.5 </option>
							        <option value="delay12">6.0 </option>
								</select>
							</td>
						</tr>
						
						<tr>
							<td>Duration (in seconds): </td>
							<td colspan="2">
								<select id="eds_duration" name="eds_duration" class = "input input--dropdown">
									<option value="">None</option>
									<option value="duration1">0.5 </option>
							        <option value="duration2">1.0 </option>
							        <option value="duration3">1.5 </option>
							        <option value="duration4">2.0 </option>
							        <option value="duration5">2.5 </option>
							        <option value="duration6">3.0 </option>
							        <option value="duration7">3.5 </option>
							        <option value="duration8">4.0 </option>
							        <option value="duration9">4.5 </option>
							        <option value="duration10">5.0 </option>
							        <option value="duration11">5.5 </option>
							        <option value="duration12">6.0 </option>
							        <option value="duration13">6.5 </option>
							        <option value="duration14">7.0 </option>
							        <option value="duration15">7.5 </option>
							        <option value="duration16">8.0 </option>
							        <option value="duration17">8.5 </option>
							        <option value="duration18">9.0 </option>
							        <option value="duration19">9.5 </option>
							        <option value="duration20">10.0 </option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Animate Infinitely: </td>
							<td colspan="2">
								<input type="checkbox"  data-size="large" name="eds_infinite" data-on-text="Yes" data-off-text="No" /> 	
							</td>
						</tr>
						<tr>						
							<td style="text-align:left;">
								<br/>
								<b>Animate On:</b> 
							</td>
							<td colspan="2">
								<br/>
								<i>(Please select any one option)</i>								 
							</td>
						</tr>						
						<tr>
							<td>Click: </td>
							<td colspan="2">
								<input type="radio"  data-size="large" name="eds_animate_on" value="click" data-on-text="Yes" data-off-text="No" data-radio-all-off="true" />
							</td>
						</tr>
						<tr>
							<td>Hover: </td>
							<td colspan="2">
								<input type="radio"  data-size="large" name="eds_animate_on" value="hover" data-on-text="Yes" data-off-text="No" data-radio-all-off="true" /> 
							</td>
						</tr>
						<tr>
							<td>Scroll: </td>
							<td colspan="2">
								<input type="radio"  data-size="large" name="eds_animate_on" value="scroll" data-on-text="Yes" data-off-text="No" data-radio-all-off="true" />								 
							</td>
						</tr>
						<tr class="scroll_offset_wrapper">
							<td>Scroll Offset (in %): </td>
							<td colspan="2">
								<input class="input" type="text" name="scroll_offset" id="scroll_offset" value="" />
							</td>
						</tr>						
						
						<tr>
							<td colspan="3" style="text-align: center;">
								<button type="button" class="butt button-animate-it-green" onClick="insertEDSAnimate()">Insert</button>
								<button type="button" class="butt button-animate-it-cancel" onclick="window.parent.SqueezeBox.close();">Cancel</button>
							</td>						
						</tr>	
						<tr>
							<td colspan="3" style="text-align: center;">
								Powered by <a href="http://www.eleopard.in/" target="_blank">eLEOPARD</a> and <a href="http://daneden.github.io/animate.css/" target="_blank">Animate.css</a>
							</td>								
						</tr>
					</table>		
				</form>
			</div>
		</main>		
		
		<script src="assets/jquery-1.11.1.min.js"></script>
		<script src="assets/bootstrap-switch.js"></script>
		<script>
		function testAnim(x) {
		    $('#animationSandbox').removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		      $(this).removeClass();
		    });
		};
		
		$(document).ready(function(){
			$(".scroll_offset_wrapper").hide();
			$("input[name=eds_infinite]").bootstrapSwitch();
		  	$("input[name=eds_animate_on]").bootstrapSwitch();

		  	$('input[name="eds_animate_on"]').on('switchChange.bootstrapSwitch', function(event, state) {			  	  	
				if($('input[name=eds_animate_on]:radio:checked').val()!= null &&
						$('input[name=eds_animate_on]:radio:checked').val() == 'scroll')
					$(".scroll_offset_wrapper").show(500);
				else
					$(".scroll_offset_wrapper").hide(500);
		  	  	
		  	});
		  	
		    $('.js--triggerAnimation').click(function(e){
		      e.preventDefault();
		      var anim = $('.js--animations').val();
		      testAnim(anim);
		    });
		
		    $('.js--animations').change(function(){
		      var anim = $(this).val();
		      testAnim(anim);
		    });
		});
		
		</script>
		<script type= "text/javascript">
			function insertEDSAnimate()
			{
				var tag = "{edsanimate_animated_";	
							
				var hForm = document.edsanimate_form;	
				var animate_on = "";

				var scroll_offset = hForm.scroll_offset.value;

				if($('input[name=eds_animate_on]:radio:checked').val() == 'scroll' &&
						scroll_offset != '' && isNaN(scroll_offset)){
					alert("Scroll Offset should be a number");
					return false; 
				}			
						
				tag += hForm.eds_style.value ;

				tag += ((hForm.eds_infinite.checked)?'_infinite':'');
				
				if( hForm.eds_delay.value!="")
					tag +=  "_" + hForm.eds_delay.value;

				if( hForm.eds_duration.value!="")
					tag +=  "_" + hForm.eds_duration.value;

				animate_on =  $('input[name=eds_animate_on]:radio:checked').val();

				if(animate_on != null)
					tag += '_eds-on-'+animate_on;

				if(animate_on=='scroll' && scroll_offset!= '')
					tag += '_scrolloffset_'+scroll_offset+'';				
				
				tag += '}';
				
				tag += "<br/><br/><b>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</b><br/>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type<br/><br/>{/edsanimate}";
				
				window.parent.insertEdsAnimateTag( '<?php echo $ih_name; ?>', tag);
				
				window.parent.SqueezeBox.close();       		
			}
		</script>	
	</body>
</html>	