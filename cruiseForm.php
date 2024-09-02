<?php
$destination_cursor = $m->destination(["_id" => ['$ne' => null]], 2);
$cruiseLength_cursor = $m->cruiseLength(["_id" => ['$ne' => null]], 2);
$departPort_cursor = $m->departPort(["_id" => ['$ne' => null]], 2);
$cruiseShipData_cursor = $m->cruiseShipData(["_id" => ['$ne' => null]], 2);
?>

<div class="main_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 p_lrzero">
                <div class="form-left">
                    <form class="needs-validation" autocomplete="off" action="<?php echo $_SERVER['PHP_SELF']; ?>"
                        method="post" id="cruiseForm">
                        <div class="upperside">
                            <h2 class="mb-1 form_heding">Book Cruises Online And Save</h2>
                            <div class="form-row row m_bottom">
                                <div class="form-group col-md-6 p_lzero">
                                    <label for="name">Name*</label>
                                    <input type="text" class="form-control input-sm input-sm2" id="name" name="name"
                                        placeholder="Please enter your name" onkeyup="show_name(this.value);" required
                                        autocomplete="off">
                                    <div class="tooltip-error error1" style="display: none;">
                                        <i class="fa-solid fa-triangle-exclamation" style="color: #ff0000;"></i>
                                        Please enter your name.
                                    </div>
                                </div>
                                <div class="form-group col-md-6 p_lzero">
                                    <label for="email">Email*</label>
                                    <input type="email" class="form-control input-sm input-sm2" id="email" name="email"
                                        placeholder="Please enter a valid email" onkeyup="checkEmail(this.value);"
                                        required autocomplete="off">
                                    <div class="tooltip-error error2" style="display: none;">
                                        <i class="fa-solid fa-triangle-exclamation" style="color: #ff0000;"></i>
                                        Please enter your email.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row mb-1">
                                <div class="form-group col-md-6 mb-2 p_lzero">
                                    <label for="number">Phone Number*</label>
                                    <input type="tel" class="form-control input-sm input-sm2" id="number" name="number"
                                        placeholder="Please enter your phone number" pattern="[0-9]{10}" maxlength="10"
                                        onkeyup="checkValidateMobile(this.value)" required autocomplete="off"
                                        inputmode="numeric">
                                    <div class="tooltip-error error3" style="display: none;">
                                        <i class="fa-solid fa-triangle-exclamation" style="color: #ff0000;"></i>
                                        Please enter your mobile number.
                                    </div>
                                </div>
                                <div class="form-group col-md-6 p_lzero mb-2">
                                    <label>Travelers*</label>
                                    <select placeholder="Travelers" id="travelers" name="travelers"
                                        onchange="chooseTravelers(this.value)"
                                        class="floating-select form-select input-sm input-sm2" required>
                                        <option value="" selected>Travelers</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6+</option>
                                    </select>
                                    <div class="tooltip-error error4" style="display: none;">
                                        <i class="fa-solid fa-triangle-exclamation" style="color: #ff0000;"></i>
                                        Please select your Travelers.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_line">&nbsp;</div>

                        <!-- downside form -->
                        <div class="downside">
                            <div class="form-row row m_bottom">
                                <!-- destination -->
                                <div class="form-group col-md-6 p_lzero nw_list">
                                    <label>Destination</label>
                                    <div class="dropdown dropdown-custom">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="dropdown-text destination-text">Destination (Any)</span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-destination">
                                            <div class="drop_scroll">
                                                <?php foreach ($destination_cursor as $value): ?>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            <label>
                                                                <?php if ($value["destination"] == "Any Destination") { ?>
                                                                    <span class="me-2"><input id="destination"
                                                                            name='destination-input[]' type="checkbox" class=""
                                                                            value='Destination (Any)' checked /></span>
                                                                    <span><?php echo $value["destination"] ?></span>
                                                                <?php } else { ?>
                                                                    <span class="me-2"><input id="destination"
                                                                            name='destination-input[]' type="checkbox" class=""
                                                                            value='<?php echo $value["destination"] ?>' /></span>
                                                                    <span><?php echo $value["destination"] ?></span>
                                                                <?php } ?>
                                                            </label>
                                                        </a>
                                                    </li>
                                                <?php endforeach ?>
                                            </div>
                                            <div class="bottom row">
                                                <div class="col-md-8 col-8 ps-1">
                                                    <div class="btn btn-primary apply_btn desti-btn" id="applybtn"
                                                        value="filter">
                                                        Apply Filters
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-4 ps-1">
                                                    <div class="btn btn-primary apply_btn_cancel desti-cancel"
                                                        value="filter">Cancel</div>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                <!-- cruise length -->
                                <div class="form-group col-md-6 p_lzero">
                                    <label>Cruise Length</label>
                                    <div class="dropdown dropdown-custom">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="dropdown-text cruiselength-text">Cruise Length (Any)</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <div class="drop_scroll">
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <label>
                                                            <span class="me-2"><input name='cruise-length[]'
                                                                    type="checkbox" class="" value='Cruise Length (Any)'
                                                                    checked /></span>
                                                            <div class="cruise_length_night">
                                                                <span>Any Cruise Length</span>
                                                            </div>
                                                        </label>
                                                    </a>
                                                </li>
                                                <?php foreach ($cruiseLength_cursor as $value): ?>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            <label>
                                                                <span class="me-2"><input name='cruise-length[]'
                                                                        type="checkbox" class=""
                                                                        value='<?php echo $value["value"] ?>' /></span>
                                                                <div class="cruise_length_night">
                                                                    <span><?php echo $value["value"] ?></span>Nights
                                                                </div>
                                                            </label>
                                                        </a>
                                                    </li>
                                                <?php endforeach ?>
                                            </div>

                                            <div class="bottom row">
                                                <div class="col-md-8 col-8 ps-1">
                                                    <div class="btn btn-primary apply_btn cruise-btn" value="filter">
                                                        Apply Filters
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-4 ps-1">
                                                    <div class="btn btn-primary apply_btn_cancel cruiselength-cancel"
                                                        value="filter">Cancel</div>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row m_bottom">
                                <!-- *Departure date -->
                                <div class="form-group col-md-6 p_lzero">
                                    <label>Departure Date</label>
                                    <div class="dropdown dropdown-custom">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="dropdown-text depart-date">Departure Date (Any)</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <div class="drop_scroll">
                                                <li class="p-3 pb-0">
                                                    <select id="month" placeholder="Any Month"
                                                        class="btn-secondary dropdown-toggle btn-secondary_month">
                                                    </select>
                                                    <select id="date"
                                                        class="btn-secondary dropdown-toggle btn-secondary_month btn-secondary_day"
                                                        placeholder="Any Day">
                                                        <option value="any">Any Date</option>
                                                    </select>
                                                    <input type="hidden" id="depart_date" name="depart_date">
                                                </li>
                                                <li class="p-3" style="color: #4560ac;display: none;">
                                                    How flexible is your departure date?<br>
                                                    <select placeholder="MM" id="flexible-date"
                                                        class="btn-secondary dropdown-toggle ps-2">
                                                        <option value="0">Use this exact date</option>
                                                        <option value="1">One day before or after</option>
                                                        <option value="3" selected="selected">
                                                            3 days before or after</option>
                                                        <option value="7">7 days before or after</option>
                                                        <option value="14">14 days before or after</option>
                                                    </select>
                                                </li>
                                                <input type="hidden" id="selected_flexible_date"
                                                    name="selected_flexible_date">
                                            </div>

                                            <div class="bottom row">
                                                <div class="col-md-8 col-8 ps-1">
                                                    <div class="btn btn-primary apply_btn depart-btn" value="filter">
                                                        Apply Filters</div>
                                                </div>
                                                <div class="col-md-4 col-4 ps-1">
                                                    <div class="btn btn-primary apply_btn_cancel depart-cancel"
                                                        value="filter">Cancel</div>
                                                </div>
                                            </div>
                                        </ul>
                                        <div class="tooltip-error error5" style="display: none;"><i
                                                class="fa-solid fa-triangle-exclamation"
                                                style="color: #ff0000;"></i>Please
                                            enter your depart date.
                                        </div>
                                    </div>
                                </div>
                                <!-- cruise line -->
                                <div class="form-group col-md-6 p_lzero">
                                    <label>Cruise Line</label>
                                    <div class="dropdown dropdown-custom">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="dropdown-text cruiseline-text">Cruise Line (Any)</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <div class="drop_scroll">
                                                <?php foreach ($cruiseShipData_cursor as $value): ?>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            <label>
                                                                <?php if ($value["cruisename"] === "Any Cruise Line") { ?>
                                                                    <span class="me-2"><input name='cruise-line[]'
                                                                            type="checkbox" class="" value='Cruise Line (Any)'
                                                                            checked /></span>
                                                                    <span><?php echo $value["cruisename"] ?></span>
                                                                <?php } else { ?>
                                                                    <span class="me-2"><input name='cruise-line[]'
                                                                            type="checkbox" class=""
                                                                            value='<?php echo $value["cruisename"] ?>' /></span>
                                                                    <span><?php echo $value["cruisename"] ?></span>
                                                                <?php } ?>
                                                            </label>
                                                        </a>
                                                    </li>
                                                <?php endforeach ?>

                                            </div>

                                            <div class="bottom row">
                                                <div class="col-md-8 col-8 ps-1">
                                                    <div class="btn btn-primary apply_btn cruiseline-btn"
                                                        value="filter">
                                                        Apply Filters</div>
                                                </div>
                                                <div class="col-md-4 col-4 ps-1">
                                                    <div class="btn btn-primary apply_btn_cancel cruiseline-cancel"
                                                        value="filter">Cancel</div>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row m_bottom">
                                <!-- cruise ship -->
                                <div class="form-group col-md-6 p_lzero">
                                    <label>Cruise Ship</label>
                                    <div class="dropdown dropdown-custom">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="dropdown-text cruiseship-text">Cruise Ship (Any)</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <div class="drop_scroll">
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <label>
                                                            <span class="me-2"><input name='cruise-ship[]'
                                                                    type="checkbox" class="" value='Cruise Ship (Any)'
                                                                    checked /></span>
                                                            <span>Any Cruise Ship</span>
                                                        </label>
                                                    </a>
                                                </li>
                                                <?php foreach ($cruiseShipData_cursor as $value): ?>
                                                    <?php foreach ($value["cruiseShips"] as $value1): ?>
                                                        <li>
                                                            <a class="dropdown-item" href="#">
                                                                <label>
                                                                    <span class="me-2"><input name='cruise-ship[]'
                                                                            type="checkbox" class=""
                                                                            value='<?php echo $value1["shipname"] ?>' /></span>
                                                                    <span><?php echo $value1["shipname"] ?></span>
                                                                </label>
                                                            </a>
                                                        </li>
                                                    <?php endforeach ?>
                                                <?php endforeach ?>
                                            </div>

                                            <div class="bottom row">
                                                <div class="col-md-8 col-8 ps-1">
                                                    <div class="btn btn-primary apply_btn cruiseship-btn"
                                                        value="filter">
                                                        Apply Filters</div>
                                                </div>
                                                <div class="col-md-4 col-4 ps-1">
                                                    <div class="btn btn-primary apply_btn_cancel cruiseship-cancel"
                                                        value="filter">Cancel
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                    <div class="invalid-feedback">
                                        Please select a cruise ship.
                                    </div>
                                </div>
                                <!-- *cruise port -->
                                <div class="form-group col-md-6 p_lzero ">
                                    <label>Cruise Port</label>
                                    <div class="dropdown dropdown-custom">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="dropdown-text cruiseport-text">Cruise Port (Any)</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <div class="drop_scroll">
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <label>
                                                            <span class="me-2"><input name='cruise-port[]'
                                                                    type="checkbox" class="" value='Cruise Port (Any)'
                                                                    checked /></span>
                                                            <span>Any Cruise Port</span>
                                                        </label>
                                                    </a>
                                                </li>
                                                <?php foreach ($departPort_cursor as $value): ?>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            <label>
                                                                <span class="me-2"><input name='cruise-port[]'
                                                                        type="checkbox" class=""
                                                                        value='<?php echo $value["departurePort"] ?>' /></span>
                                                                <span><?php echo $value["departurePort"] ?></span>
                                                            </label>
                                                        </a>
                                                    </li>
                                                <?php endforeach ?>
                                            </div>

                                            <div class="bottom row">
                                                <div class="col-md-8 col-8 ps-1">
                                                    <div class="btn btn-primary apply_btn cruiseport-btn"
                                                        value="filter">
                                                        Apply Filters</div>
                                                </div>
                                                <div class="col-md-4 col-4 ps-1">
                                                    <div class="btn btn-primary apply_btn_cancel cruiseport-cancel"
                                                        value="filter">Cancel</div>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                    <div class="invalid-feedback">
                                        Please select a departure port.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row add_mt">

                                <div
                                    class="form-group col-md-12 p_lzero position-relative d-grid align-items-center mt-2 add_hover">

                                    <a class="collapsed col-md-6" data-bs-toggle="collapse" href="#collapseExample"
                                        role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Additional Discounts
                                        <img class="arrow-down" src="images/add_arrow.svg" alt="Arrow">
                                    </a>

                                    <div class="collapse col_pse" id="collapseExample">
                                        <div class="card card-body add_body">
                                            <div class="row">
                                                <div class="col-md-6 add_dis_grid">
                                                    <span class="w-100">
                                                        <b>Zip Code:</b>
                                                    </span>
                                                    <span class="w-100"><input type="text" name="numberInput"
                                                            id="numberInput" class="zip">
                                                        <i class="fa fa-info-circle pin-popover" data-toggle="popover">
                                                        </i>
                                                    </span>
                                                    <span class="w-100">5-digit U.S. Zip Code</span>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="float-start senior_dis">
                                                        <span>
                                                            <input type="checkbox" class="discount_chk" id="vehicle1"
                                                                name="discount1" value="">
                                                            <label class="discount-label" for="discount1">
                                                                Senior Discount
                                                            </label>
                                                            &nbsp;<i class="fa fa-info-circle senior-popover"
                                                                data-toggle="popover"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="uniqueId" value="<?php echo $num; ?>" />
                            <div class="row position-relative">
                                <div class="form-group col-md-12 p_lzero">
                                    <div id="buttonContainer" class="request_btn">
                                        <div class="form-group custombtn">
                                            <button type="submit" id="submit1" class="btn btn_submit">
                                                Request a Quote</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="form-group custombtn position-relative">
                                        <div class="spinner-border" id="loading" role="status"
                                            style="margin: 0 auto; display: none;">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        <div id="f">
                                            <p id="formSubmitted">
                                                <i class="fa-regular fa-circle-check" style="color: #13a936;"></i> Thank
                                                you! Your request has been submitted successfully. Our experts will
                                                contact you soon.
                                            </p>
                                        </div>
                                        <div class="toast-container" id="myToast">
                                            <div class="toast bg-primary text-white fade show">
                                                <div class="toast-body">
                                                    Your Request Have been submitted successfully.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-right ">
                    <div class="upto_main">
                        <div class="uptotxt">
                            <div class="Up_to">Up to</div>
                            <div class="OFF">37% OFF</div>
                            <div class="Cheap_Cruises">Cheap Cruises</div>
                        </div>
                        <div class="banner_sec_por text-center">
                            <h1>Need Help Booking?</h1>
                            <p class="banner_deal">It's Free! <span><br>Call Experts 24x7x365</span></p>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="banner_call"><i class="fas fa fa-phone" aria-hidden="true"></i>
                                        <a role="button" aria-label="call 1-213-225-9867"
                                            href="tel:1-213-225-9867">1-213-225-9867</a>
                                    </div>
                                </div>
                            </div>
                            <div class="world_lar">World’s Largest Cruise Agency</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="mail" style="display: none;background-color: #eeeeee; margin: 0 auto"></div>