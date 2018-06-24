<!DOCTYPE html>
<html>
    <head>
        <title>SUB PRE-ORDER</title>
        <script src="../js/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h3 align="center">SUMMARY OF ORDER</h3>
            </div>


            <div class="content">
                <form method="post" id="crud_form">
                    <div class="grid-container-3">
                        <div class="grid-item-no-border text-left">
                            <label><b>Pre-Order Your <span class="color-red">SUB</span> by <span class="time-header"></span></b></label><br/><br/>
                            <label class="color-red"><i>Late Orders are not accepted.</i></label><br/>
                            <label>Orders not picked up will not be allowed to pre order again.</label>
                        </div>
                        <div class="grid-item-no-border text-center">
                            <img src="../images/sub-bread.png" alt="Sub Bread" style="width:30%;;">
                        </div>
                        <div class="grid-item-no-border text-right">
                            <div class="input-group">
                                <label>Full Name: </label>
                                <input type="text" name="fullname" id="fullname" class="form-control" disabled/>
                            </div>
                            <div class="input-group">
                                <label>Date: </label>
                                <input type="text" name="date" id="date" class="form-control" disabled/>
                            </div>
                            <div class="input-group">
                                <label>Time: </label>
                                <input type="text" name="time" id="time" class="form-control" disabled/>
                            </div>
                        </div>
                    </div>

                    <div class="grid-container-5">
                        <div class="grid-item">
                            <label class="text-center"><b>Step 1: Bread</b></label><br/>
                            <label><input type="radio" name="bread" value="whole-wheat" disabled> Whole Wheat</label>
                            <label><input type="radio" name="bread" value="italian-herb" disabled> Italian Herb</label>
                            <label><input type="radio" name="bread" value="jalapeno-parmesan" disabled> Jalapeno Parmesan</label>
                        </div>
                        <div class="grid-item">
                            <label class="text-center"><b>Step 2: Sauce</b></label><br/>
                            <label><input type="radio" name="sauce" value="mayo" disabled> Mayo</label>
                            <label><input type="radio" name="sauce" value="mustard" disabled> Mustard</label>
                            <label><input type="radio" name="sauce" value="honey-mustard" disabled> Honey Mustard</label>
                            <label><input type="radio" name="sauce" value="spicy-mayo" disabled> Spicy Mayo</label>
                        </div>
                        <div class="grid-item">
                            <label class="text-center"><b>Step 3: Sandwich Type</b></label><br/>
                            <label><input type="radio" name="sandwich_type" value="turkey-bacon-club" disabled> Turkey Bacon Club</label>
                            <label><input type="radio" name="sandwich_type" value="oven-roasted-turkey" disabled> Oven Roasted Turkey</label>
                            <label><input type="radio" name="sandwich_type" value="savory-ham" disabled> Savory Ham</label>
                            <label><input type="radio" name="sandwich_type" value="italian" disabled> Italian <br/>&nbsp;&nbsp;&nbsp;&nbsp;(Salami, Ham & Pepperoni)</label>
                        </div>
                        <div class="grid-item">
                            <label class="text-center"><b>Step 4: Cheese</b></label><br/>
                            <label><input type="radio" name="cheese" value="american" disabled> American</label>
                            <label><input type="radio" name="cheese" value="swiss" disabled> Swiss</label>
                            <label><input type="radio" name="cheese" value="pepperjack" disabled> Pepperjack</label>
                        </div>
                        <div class="grid-item">
                            <label class="text-center"><b>Step 5: Veggies</b></label><br/>
                            <label><input type="radio" name="veggies" value="cucumber" disabled> Cucumber</label>
                            <label><input type="radio" name="veggies" value="lettuce" disabled> Lettuce</label>
                            <label><input type="radio" name="veggies" value="pepper-banana" disabled> Pepper's - Banana</label>
                            <label><input type="radio" name="veggies" value="pepper-jalapeno" disabled> Pepper's - Jalapeno</label>
                            <label><input type="radio" name="veggies" value="pepper-green-and-red" disabled> Pepper's - Green and Red</label>
                            <label><input type="radio" name="veggies" value="pickles" disabled> Pickles</label>
                            <label><input type="radio" name="veggies" value="spinach" disabled> Spinach</label>
                            <label><input type="radio" name="veggies" value="tomato" disabled> Tomato</label>
                            <label><input type="radio" name="veggies" value="olives" disabled> Olives</label>
                            <label><input type="radio" name="veggies" value="onions" disabled> Onions</label>
                        </div>
                    </div>

                    <div class="text-right">
                        <div class="input-group">
                            <input type="hidden" name="id" id="id"/>
                            <input type="hidden" name="action" id="action" value="update"/>
                            <button type="button" class="btn btn-default back">Back</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <footer>
            <script type="text/javascript">
                $(document).ready(function () {

                    var id = <?php print $_GET['id'] ?>;
                    var action = 'fetch_single';

                    $.ajax({
                        url: "action.php",
                        method: "POST",
                        data: {id: id, action: action},
                        dataType: "json",
                        success: function (data) {
                            $('.time-header').html(data.time);
                            $('#id').val(id);
                            $('#fullname').val(data.fullname);
                            $('#date').val(data.date);
                            $('#time').val(data.time);
                            $("input[name='bread'][value='" + data.bread + "']").prop('checked', true);
                            $("input[name='sauce'][value='" + data.sauce + "']").prop('checked', true);
                            $("input[name='sandwich_type'][value='" + data.sandwich_type + "']").prop('checked', true);
                            $("input[name='cheese'][value='" + data.cheese + "']").prop('checked', true);
                            $("input[name='veggies'][value='" + data.veggies + "']").prop('checked', true);
                        }
                    })

                    $('.back').click(function () {
                        $(location).attr('href', 'http://localhost/sub-pre-order/work');
                    });
                });
            </script>
        </footer>
    </body>
</html>