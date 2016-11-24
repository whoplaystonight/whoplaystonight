<!--Library for communicate with php-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.js"></script>
<!--Library for Dropzone-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css">
<!--Script to JavasCript Controller-->
<script type="text/javascript" src="modules/products/view/js/products.js"></script>
<!--<link rel="stylesheet" href="modules/products/view/css/events.css">-->

<section id="product_page_sc" name="product_page_sc">

	<section id="header_sc" name="header_sc">
		 <h2>FORM CREATE EVENT</h2>
	</section><!--header_sc-->

	<section id="product_form_sc" name="product_form_sc">
					 <form name="products_form" id="products_form">
					 <table width="50%"  border="0" cellspacing="0" cellpadding="0">
					 	<tr>
							<td width="24%">Event ID</td>
						  	<td width="76%">
									<input name="event_id" placeholder="Event ID" type="text" id="event_id" value="" >
									<div id="e_event_id"></div>
								</td>

						</tr>

						<tr>
							<td width="24%">Band ID</td>
						  	<td width="76%">
									<input name="band_id" placeholder="Band ID" type="text" id="band_id" value="">
									<div id="e_band_id"></div>
						  	</td>
						</tr>

						<tr>
						  	<td width="24%">Artist or Band Name</td>
						  	<td width="76%">
									<input name="band_name" placeholder="Artist or Band Name" type="text" id="band_name" value="">
						  		<div id="e_band_name"></div>
								</td>
						</tr>

						<tr><td><br></td></tr>

						<tr>
							<td width="24%">Description</td>
						  	<td width="76%">
									<textarea name="description" rows="3" cols="38"form="products_form" placeholder="Description" id="description" ></textarea>
									<div id="e_description"></div>
				  	 		</td>
						</tr>

						<tr><td><br></td></tr>

						<tr>
							<td width="24%">Country </td>
							<td width="76%">
								<select name="country" id="country"></select>
								<div id="d_country"><div>
							</td>
						</tr>

						<tr><td><br></td></tr>

						<tr>
							<td width="24%">Province</td>
							<td width="76%">
								<select name="province" id="province"></select>
								<div id="d_province"><div>
							</td>
						</tr>

						<tr><td><br></td></tr>

						<tr>
							<td width="24%">Town</td>
							<td width="76%">
								<select name="town" id="town"></select>
								<div id="d_town"><div>
							</td>
						</tr>

						<tr><td><br></td></tr>

						<tr>
						  	<td width="24%">Type of event </td>
						  	<td width="76%">
									<input type="radio" name="type_event" id="type_event" value="presentation"><text id="presentation">  Presentation Ceremony</text><br>
						  		<input type="radio" name="type_event" id="type_event"  value="concert"><text id="concert">  Concert</text><br>
								  <input type="radio" name="type_event" id="type_event" value="unplugged"><text id="unplugged">  Unplugged</text><br>
								  <input type="radio" name="type_event" id="type_event" value="Performance"><text id="Performance">  Performance</text><br>
									<div id="e_type_event"><div>
							</td>
						</tr>

						<tr><td><br></td></tr>

						<tr>
						  <td width="24%">Number of Participants</td>
						  <td width="76%">
								<input name="n_participants" placeholder="Number of Participants" type="text" id="n_participants" value="">
								<div id="e_n_participants"><div>
						  	</td>
						</tr>

						<tr>
						  <td width="24%">Date of event</td>
						  <td width="76%">
								<input name="date_event" placeholder="Date of event" type="text" id="date_event" readonly value="">
								<div id="e_date_event"><div>
					  	</td>
						</tr>

						<tr><td><br></td></tr>

						<tr>
							<td width="24%">Type of access</td>
							<td><input type="checkbox" name="type_access[]" id="type_access" class="messageCheckbox" value="Ticket" onchange="enable_date_ticket()"><text id="ticket">  Ticket</text><br>
									<input type="checkbox" name="type_access[]" id="type_access" class="messageCheckbox" value="Invitation"><text id="invitation">  Invitation</text><br>
									<input type="checkbox" name="type_access[]" id="type_access" class="messageCheckbox" value="Free admission" onchange="disable_date_ticket()"><text id="free">  Free admission</text><br>
									<div id="e_date_event"><div>
							</td>
						</tr>

						<tr><td><br></td></tr>

						<tr>
						  <td width="24%">Date of ticket sales</td>
						  <td width="76%">
								<input name="date_ticket" placeholder="Date of ticket sales" type="text" id="date_ticket" readonly value="">
								<div id="e_date_ticket"><div>
							</td>
						</tr>

						<tr><td><br></td></tr>

						<tr>
						  <td width="24%">Doors openning </td>
						  <td width="76%">
								<select name="openning" id="openning">
							  	<option value="">--:--</option>
									<option value="00:00">00:00</option>
									<option value="01:00">01:00</option>
									<option value="02:00">02:00</option>
									<option value="03:00">03:00</option>
									<option value="04:00">04:00</option>
									<option value="05:00">05:00</option>
									<option value="06:00">06:00</option>
									<option value="07:00">07:00</option>
									<option value="08:00">08:00</option>
									<option value="09:00">09:00</option>
									<option value="10:00">10:00</option>
									<option value="11:00">11:00</option>
									<option value="12:00">12:00</option>
									<option value="13:00">13:00</option>
									<option value="14:00">14:00</option>
									<option value="15:00">15:00</option>
									<option value="16:00">16:00</option>
									<option value="17:00">17:00</option>
									<option value="18:00">18:00</option>
									<option value="19:00">19:00</option>
									<option value="20:00">20:00</option>
									<option value="21:00">21:00</option>
									<option value="22:00">22:00</option>
									<option value="23:00">23:00</option>
							  </select>
								<div id="openning"><div>
							</td>
						</tr>

						<tr>
						  <td width="24%">Start of event </td>
						  <td width="76%">
								<select name="start" id="start">
							  	<option value="">--:--</option>
									<option value="00:00">00:00</option>
									<option value="01:00">01:00</option>
									<option value="02:00">02:00</option>
									<option value="03:00">03:00</option>
									<option value="04:00">04:00</option>
									<option value="05:00">05:00</option>
									<option value="06:00">06:00</option>
									<option value="07:00">07:00</option>
									<option value="08:00">08:00</option>
									<option value="09:00">09:00</option>
									<option value="10:00">10:00</option>
									<option value="11:00">11:00</option>
									<option value="12:00">12:00</option>
									<option value="13:00">13:00</option>
									<option value="14:00">14:00</option>
									<option value="15:00">15:00</option>
									<option value="16:00">16:00</option>
									<option value="17:00">17:00</option>
									<option value="18:00">18:00</option>
									<option value="19:00">19:00</option>
									<option value="20:00">20:00</option>
									<option value="21:00">21:00</option>
									<option value="22:00">22:00</option>
									<option value="23:00">23:00</option>
							  </select>
								<div id="start"><div>

							</td>
						</tr>

						<tr>
						  <td width="24%">End of event </td>
						  <td width="76%">
								<select name="end" id="end">
							  	<option value="">--:--</option>
									<option value="00:00">00:00</option>
									<option value="01:00">01:00</option>
									<option value="02:00">02:00</option>
									<option value="03:00">03:00</option>
									<option value="04:00">04:00</option>
									<option value="05:00">05:00</option>
									<option value="06:00">06:00</option>
									<option value="07:00">07:00</option>
									<option value="08:00">08:00</option>
									<option value="09:00">09:00</option>
									<option value="10:00">10:00</option>
									<option value="11:00">11:00</option>
									<option value="12:00">12:00</option>
									<option value="13:00">13:00</option>
									<option value="14:00">14:00</option>
									<option value="15:00">15:00</option>
									<option value="16:00">16:00</option>
									<option value="17:00">17:00</option>
									<option value="18:00">18:00</option>
									<option value="19:00">19:00</option>
									<option value="20:00">20:00</option>
									<option value="21:00">21:00</option>
									<option value="22:00">22:00</option>
									<option value="23:00">23:00</option>
							  </select>
								<div id="e_end"><div>
							</td>
						</tr>
						<tr><td><br></td></tr>
						<tr>
							<td>
								<section class="form_group" id="progress">
									<div id="bar"></div>
									<div id="percent"></div>
								</section>
							</td>
						</tr>
						<tr>
							<td>
								<section class="msg"></section>
							</td>
						</tr>
						<tr>
							<td>
							<section id="dropzone" class="dropzone"></section>
							</td>
						</tr>

						<tr>
						  <td><button type="button" id="submit_products" name="submit_products" value="Save">Save</button></td>
						  <td>&nbsp;</td>
						</tr>
					  </table>
					</form>
 </section>
</section><!--product_page_sc-->
