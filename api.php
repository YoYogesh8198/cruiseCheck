<?php
error_reporting(0);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: X-Requested-With");
header("Content-Type: application/json");

$response = [
    "success" =>
        false,
    "message" => "some error occured"
];
include "db.php";
$m = new monogd();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $number = $_POST["number"];
        $travelers = $_POST["travelers"];
        $destination = $_POST["destination-input"] ?? [];
        $cruise_length = $_POST["cruise-length"] ?? [];
        $depart = $_POST["depart_date"];
        $selected_flexible_date = $_POST["selected_flexible_date"];
        $cruise_line = $_POST["cruise-line"] ?? [];
        $cruise_ship = $_POST["cruise-ship"] ?? [];
        $departure_port = $_POST["cruise-port"] ?? [];
        $numberInput = $_POST["numberInput"];
        $uniqueId = $_POST["uniqueId"];
        $temp = '
         <div style="background-color: #eeeeee; margin: 0 auto; max-width:700px;  font-family:Arial, Helvetica, sans-serif; line-height:21px; border-spacing: 0 !important; 
                  border-collapse: collapse !important; 
                  margin: 0 auto !important; ">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width:700px;">
         <tbody>
            <tr style="background-color:#fff">
               <td>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0"
                     style="padding:10px 20px 14px 20px;border-bottom:solid 1px #eaeaea">
                     <tbody>
                        <tr>
                           <td align="left" valign="top">
                              <a href="https://www.airtkt.com/" target="_blank">
                                 <img src="https://cdn.airfuture.com/img/res/tkt-logo.gif" style="max-width: 100%;"
                                    alt="CheapFareGuru Logo"></a>
                           </td>
                           <td align="left" valign="top" width="1%"> </td>
                           <td align="right" style="color:#db2e35;font-size:22px;font-weight:bold">
                              <img src="images/call-icon.png" alt="Call us on 1-213-225-9858 to avail the best deal!"
                                 width="18" height="18" style="height:auto">
                              <a href="tel:1-213-225-9867" style="color:#db2e35;text-decoration:none"
                                 target="_blank">1-213-225-9867</a>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
            <tr style="background-color:#fff">
               <td>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <tbody>
                        <tr>
                           <td>
                              <img src="images/mailer-hero-5.jpg" alt="Travel Banner image" style="max-width:100%"
                                 class="CToWUd a6T" tabindex="0">

                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>

            <tr style="background-color:#fff">
               <td style="padding:16px 20px 20px 20px;text-align:left">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <tbody>
                        <tr>
                           <td align="left" valign="top"
                              style="color:#666;font-size:17px;font-weight:normal;line-height:24px">
                              Hi ' . $name . ', </td>
                        </tr>
                        <tr>
                           <td height="8"></td>
                        </tr>
                        <tr>
                           <td align="left" valign="top"
                              style="color:#666;font-size:17px;font-weight:normal;line-height:24px">
                              Thank you for choosing Airtkt.com for your next cruise adventure! Your journey awaits!
                              Below is your exclusive cruise itinerary, packed with unforgettable experiences. Get ready
                              for an incredible journey--Bon Voyage!
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>

            <tr>
               <td height="12"></td>
            </tr>
            <tr>
            </tr>
            <tr style="background-color:#fff">
               <td
                  style="color:#255095;font-size:18px;text-align:left;line-height:20px;font-weight:bold;vertical-align:middle;padding:10px 20px">
                  Trip Details:</td>
            </tr>
            <tr>
               <td style="padding:0px 20px 20px 20px;text-align:left; background-color:#fff; ">
                  <table class="bor_right" width="100%" border="0" cellspacing="0" cellpadding="0"
                     style="border: 1px solid #e4e4e4; border-bottom: 0px; line-height: 20px; color: #333; font-size: 17px;">
                     <tbody>
                        <tr class="tble_titie">
                           <td align="left" valign="top" width="30%"
                              style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                              Destination:</td>
                           <td align="left" valign="top"
                              style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; line-height: 22px; color: #666666;">
                              ' . implode(", ", $destination) . '</td>
                        </tr>
                        <tr class="tble_titie">
                           <td align="left" valign="top" width="30%"
                              style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                              Cruise Length:</td>
                           <td align="left" valign="top"
                              style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; line-height: 22px; color: #666666;">
                              ';
        if (count($cruise_length) > 1) {
            $temp .= implode("Nights, ", $cruise_length) . "Nights</td>";
        } else {
            if ($cruise_length[0] == "Cruise Length (Any)") {
                $temp .= "Cruise Length (Any)";
            } else {
                $temp .= $cruise_length[0] . "Nights";
            }
        }
        $temp .= '
               </td>
            </tr>
            <tr class="tble_titie">
               <td align="left" valign="top" width="30%"
                  style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                  Departure Date:</td>
               <td align="left" valign="top"
                  style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; line-height: 22px; color: #666666;">
                  ' . $selected_flexible_date . '</td>
            </tr>
            <tr class="tble_titie">
               <td align="left" valign="top" width="30%"
                  style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                  Cruise Line:</td>
               <td align="left" valign="top"
                  style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; line-height: 22px; color: #666666;">
                  ' . implode(", ", $cruise_line) . '</td>
            </tr>
            <tr class="tble_titie">
               <td align="left" valign="top" width="30%"
                  style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                  Cruise Ship:</td>
               <td align="left" valign="top"
                  style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; line-height: 22px; color: #666666;">
                  ' . implode(", ", $cruise_ship) . '</td>
            </tr>
            <tr class="tble_titie">
               <td align="left" valign="top" width="30%"
                  style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                  Cruise Port:</td>
               <td align="left" valign="top"
                  style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; line-height: 22px; color: #666666;">
                  ' . implode(", ", $departure_port) . '</td>
            </tr>
            <tr class="tble_titie">
               <td align="left" valign="top" width="30%"
                  style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                  Travelers:</td>
               <td align="left" valign="top"
                  style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; line-height: 22px; color: #666666;">
                  ' . $travelers . ' Members</td>
            </tr>
            ';
        if (!empty($numberInput)) {
            $temp .= '
            <tr class="tble_titie">
               <td align="left" valign="top" width="30%"
                  style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                  Additional Discounts:</td>
               <td align="left" valign="top"
                  style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; line-height: 22px; color: #666666;">
                  Zip Code (' . $numberInput . ')</td>
            </tr>
            ';
        }
        $temp .= '
         </tbody>
      </table>
      </td>
      </tr>
      <tr>
         <td height="12"></td>
      </tr>
      <tr>
         <td><img src="images/cruise-2.jpg" style="max-width: 100%;"></td>
      </tr>
      <tr>
         <td height="12"></td>
      </tr>
      <tr>
      </tr>
      <tr style="background-color:#fff">
         <td
            style="color:#255095;font-size:18px;text-align:left;line-height:20px;font-weight:bold;vertical-align:middle;padding:10px 20px">
            Cruise Itinerary:</td>
      </tr>
      <tr>
         <td style="padding:0px 20px 20px 20px;text-align:left; background-color:#fff; ">
            <table class="bor_right" width="100%" border="0" cellspacing="0" cellpadding="0"
               style="border: 1px solid #e4e4e4; border-bottom: 0px; line-height: 20px; color: #666; font-size: 17px;">
               <tbody>
                  <tr class="tble_titie">
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;  color: #333;">
                        Dates</td>
                     <td align="left" width="27%" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px; color: #333;">
                        Ports of Call</td>
                     <td align="left" width="14%" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px; color: #333;">
                        Arrival Time</td>
                     <td align="left" width="14%" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px; color: #333;">
                        Departure Time</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; line-height: 22px; color: #333;">
                        Activity</td>
                  </tr>
                  <tr class="tble_titie">
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        Sat 24 Aug, 2024</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        Miami, Florida</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        -</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        5:00 PM</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; line-height: 22px; color: #666666;">
                        Boarding</td>
                  </tr>
                  <tr class="tble_titie">
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        Sun 25 Aug, 2024</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        Cruising</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        -</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        -</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; line-height: 22px; color: #666666;">
                        Cruising</td>
                  </tr>
                  <tr class="tble_titie">
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        Mon 26 Aug, 2024</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        Cruising</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        -</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        -</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; line-height: 22px; color: #666666;">
                        Cruising</td>
                  </tr>
                  <tr class="tble_titie">
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        Tue 27 Aug, 2024</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        Philipsburg St. Maarten</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        8:00 AM</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        6:00 PM</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; line-height: 22px; color: #666666;">
                        Docked</td>
                  </tr>
                  <tr class="tble_titie">
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        Wed 28 Aug, 2024</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        Charlotte Amalie St. Thomas</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        7:00 AM</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        3:00 PM</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; line-height: 22px; color: #666666;">
                        Docked</td>
                  </tr>
                  <tr class="tble_titie">
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        Thu 29 Aug, 2024</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        Cruising</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        -</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        -</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; line-height: 22px; color: #666666;">
                        Cruising</td>
                  </tr>
                  <tr class="tble_titie">
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        Fri 30 Aug, 2024</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        Perfect Day At Cococay, Bahamas</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        9:00 AM</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        5:00 PM</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; line-height: 22px; color: #666666;">
                        Docked</td>
                  </tr>
                  <tr class="tble_titie">
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        Sat 31 Aug, 2024</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        Miami, Florida</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        6:00 AM</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4; line-height: 22px;">
                        -</td>
                     <td align="left" valign="top"
                        style="display: table-cell; min-height: 35px; padding: 15px 5px 15px 10px; border-bottom: 1px solid #e4e4e4; line-height: 22px; color: #666666;">
                        Departure</td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
      <tr>
         <td height="12"></td>
      </tr>
      <tr>
         <td style="border: 1px solid #e4e4e4;"><img src="images/cruise-map.jpg" style="max-width: 100%;"></td>
      </tr>
      <tr>
         <td height="12"></td>
      </tr>
      <tr style="background-color:#fff">
         <td
            style="color:#255095;font-size:18px;text-align:left;line-height:20px;font-weight:bold;vertical-align:middle;padding:10px 20px">
            Why Us?</td>
      </tr>
      <tr style="background-color:#fff">
         <td style="padding:15px 20px;border-top:1px solid #eee">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tbody>
                  <tr>
                     <td valign="top" style="text-align:left;line-height:0">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tbody>
                              <tr>
                                 <td width="48%" valign="top">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                       <tbody>
                                          <tr>
                                             <td width="52px" valign="top" style="line-height:0">
                                                <img src="images/trustpilot.png" alt="Excellent 69,000+ reviews"
                                                   style="max-width:100%">
                                             </td>
                                             <td valign="middle"
                                                style="line-height:normal;color:#666;font-size:17px;font-weight:normal">
                                                Excellent 69,000+ <a href="#" target="_blank">reviews</a>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                                 <td width="4%"></td>
                                 <td width="48%" valign="top">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0"
                                       style="padding-left:10px">
                                       <tbody>
                                          <tr>
                                             <td width="52px" valign="top" style="line-height:0">
                                                <img src="images/since.png" alt="Expert Since 1990"
                                                   style="max-width:100%">
                                             </td>
                                             <td valign="middle"
                                                style="line-height:normal;color:#666;font-size:17px;font-weight:normal">
                                                Expert Since 1990
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                           </tbody>
                        </table>

                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tbody>
                              <tr>
                                 <td height="14"></td>
                              </tr>
                              <tr>
                                 <td width="48%" valign="top">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                       <tbody>
                                          <tr>
                                             <td width="52px" valign="top" style="line-height:0">
                                                <img src="images/easier.png" alt="Easier Than Ever Booking"
                                                   style="max-width:100%">
                                             </td>
                                             <td valign="middle"
                                                style="line-height:normal;color:#666;font-size:17px;font-weight:normal">
                                                Easier Than Ever Booking
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                                 <td width="4%"></td>
                                 <td width="48%" valign="top">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0"
                                       style="padding-left:10px">
                                       <tbody>
                                          <tr>
                                             <td width="52px" valign="top" style="line-height:0">
                                                <img src="images/twenty.png" alt="Available 24x7x365"
                                                   style="max-width:100%">
                                             </td>
                                             <td valign="middle"
                                                style="line-height:normal;color:#666;font-size:17px;font-weight:normal">
                                                Available 24x7x365
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
      <tr>
         <td height="12"></td>
      </tr>
      <tr>
         <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tbody>
                  <tr>
                     <td width="50%" style="background:#ffffff;padding:10px;border-right:1px solid #dfdfdf">
                        <div style="color:#333333;font-size:17px;text-align:center;line-height:22px">
                           AirTkt Cruise Experts Available<br>
                           <span style="font-size:18px;font-weight:bold;line-height:28px">
                              <a href="tel:1-213-225-9867" style="color:#333333;text-decoration:none"
                                 target="_blank"><img src="images/black-call.png"
                                    alt="Call us on 1-213-225-9867 to avail the best deal!">
                                 1-213-225-9867</a>
                           </span>
                        </div>
                     </td>
                     <td width="50%" style="background:#ffffff;padding:10px">
                        <div style="color:#333333;font-size:17px;text-align:center;line-height:22px">
                           <a style="color:blue" href="mailto:airtkt@airtktclub.com?subject=+Offer+ID+0704-423"
                              target="_blank">
                              <img src="images/envelope.png" alt="Email Icon" style="padding-right:5px">Email
                              Us</a>
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
      <tr>
         <td height="12"></td>
      </tr>
      <tr>
         <td>
            <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:#fff;padding:0 0">
               <tbody>
                  <tr>
                     <td height="5"></td>
                  </tr>
                  <tr>
                     <td>
                        <table width="100%" style="border-bottom:1px solid #eee;padding:8px 18px">
                           <tbody>
                              <tr>
                                 <td style="text-align: left">
                                    <a href="#"><img src="images/chat.png" alt="Chat button"></a>
                                 </td>
                                 <td valign="top" width="60%" style="text-align:right;padding-top:15px">
                                    <a href="#" target="_blank"><img src="images/facebook_icon.png"
                                          alt="Click to follow our Facebook page"></a>
                                    <a href="#" target="_blank"><img src="images/twitter_icon.png"
                                          alt="Click to follow our Twitter page"></a>
                                    <a href="#" target="_blank"><img src="images/google-business_icon.png"
                                          alt="Click to follow our Google Plus page"></a>
                                    <a href="#" target="_blank"><img src="images/instagram_icon.png"
                                          alt="Click to follow our Instagram page"></a>
                                    <a href="#" target="_blank"><img src="images/youtube_icon.png"
                                          alt="Click to follow our YouTube page"></a>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td
                        style="color: #777777; font-size: 13px; font-weight: normal; text-align: center; line-height: 22px; padding: 15px 10px; background: #fff; ">
                        117 West 9th St., # 307, Los Angeles, CA, 90015<br>
                        Copyright © CheapFareGuru.com 2007 - 2024. All rights reserved. California: CST#
                        2021684<br>
                        <a style="color: #777777; text-decoration: none"
                           href="https://www.airtkt.com/book/support/category.php?cat=policy" target="_blank">Privacy
                           Policy</a> |
                        <a style="color: #777777; text-decoration: none"
                           href="https://www.airtkt.com/book/support/category.php?cat=terms" target="_blank">Terms
                           and
                           Conditions</a> |
                        <a style="color: #777777; text-decoration: none" href="#" target="_blank">Customer
                           Service</a>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
      </tbody>
      </table>
   </div>';
        $data =
            [
                "uniqueId" => $uniqueId,
                "name" => $name,
                "email" => $email,
                "number" => $number,
                "travelers" => $travelers,
                "destination" => $destination,
                "cruise_length" => $cruise_length,
                "depart" => $depart,
                "flexibleDate" => $selected_flexible_date,
                "cruise_line" => $cruise_line,
                "cruise_ship" => $cruise_ship,
                "departure_port" => $departure_port,
                "discount" => $numberInput,
            ];
        $m->details([$data], 3);
        $response = [
            "success" => true,
            "message" => "successfully
        Submitted ",
            "template" => $temp,
        ];
    } catch (\Throwable $th) {
        $response = ["success" => false, "message" => "An error occurred. Please try again later.",];
    }
}
echo json_encode($response);
?>