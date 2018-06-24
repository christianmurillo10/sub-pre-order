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
                <h3 align="center">ADD ORDER</h3>
            </div>

            <div class="content">
                <form method="post" id="crud_form">
                    <div class="grid-container-3">
                        <div class="grid-item-no-border text-left">
                        </div>
                        <div class="grid-item-no-border text-center">
                            <img src="../images/sub-bread.png" alt="Sub Bread" style="width:30%;;">
                        </div>
                        <div class="grid-item-no-border text-right">
                            <div class="input-group">
                                <label>Full Name: </label>
                                <input type="text" name="fullname" id="fullname" class="form-control"/>
                            </div>
                            <div class="input-group">
                                <label>Date: </label>
                                <input type="text" name="date" id="date" class="form-control"/>
                            </div>
                            <div class="input-group">
                                <label>Time: </label>
                                <input type="text" name="time" id="time" class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <div class="grid-container-5">
                        <div class="grid-item">
                            <label class="text-center"><b>Step 1: Bread</b></label><br/>
                            <label><input type="radio" name="bread" value="whole-wheat"> Whole Wheat</label>
                            <label><input type="radio" name="bread" value="italian-herb"> Italian Herb</label>
                            <label><input type="radio" name="bread" value="jalapeno-parmesan"> Jalapeno Parmesan</label>
                        </div>
                        <div class="grid-item">
                            <label class="text-center"><b>Step 2: Sauce</b></label><br/>
                            <label><input type="radio" name="sauce" value="mayo"> Mayo</label>
                            <label><input type="radio" name="sauce" value="mustard"> Mustard</label>
                            <label><input type="radio" name="sauce" value="honey-mustard"> Honey Mustard</label>
                            <label><input type="radio" name="sauce" value="spicy-mayo"> Spicy Mayo</label>
                        </div>
                        <div class="grid-item">
                            <label class="text-center"><b>Step 3: Sandwich Type</b></label><br/>
                            <label><input type="radio" name="sandwich_type" value="turkey-bacon-club"> Turkey Bacon Club</label>
                            <label><input type="radio" name="sandwich_type" value="oven-roasted-turkey"> Oven Roasted Turkey</label>
                            <label><input type="radio" name="sandwich_type" value="savory-ham"> Savory Ham</label>
                            <label><input type="radio" name="sandwich_type" value="italian"> Italian <br/>&nbsp;&nbsp;&nbsp;&nbsp;(Salami, Ham & Pepperoni)</label>
                        </div>
                        <div class="grid-item">
                            <label class="text-center"><b>Step 4: Cheese</b></label><br/>
                            <label><input type="radio" name="cheese" value="american"> American</label>
                            <label><input type="radio" name="cheese" value="swiss"> Swiss</label>
                            <label><input type="radio" name="cheese" value="pepperjack"> Pepperjack</label>
                        </div>
                        <div class="grid-item">
                            <label class="text-center"><b>Step 5: Veggies</b></label><br/>
                            <label><input type="radio" name="veggies" value="cucumber"> Cucumber</label>
                            <label><input type="radio" name="veggies" value="lettuce"> Lettuce</label>
                            <label><input type="radio" name="veggies" value="pepper-banana"> Pepper's - Banana</label>
                            <label><input type="radio" name="veggies" value="pepper-jalapeno"> Pepper's - Jalapeno</label>
                            <label><input type="radio" name="veggies" value="pepper-green-and-red"> Pepper's - Green and Red</label>
                            <label><input type="radio" name="veggies" value="pickles"> Pickles</label>
                            <label><input type="radio" name="veggies" value="spinach"> Spinach</label>
                            <label><input type="radio" name="veggies" value="tomato"> Tomato</label>
                            <label><input type="radio" name="veggies" value="olives"> Olives</label>
                            <label><input type="radio" name="veggies" value="onions"> Onions</label>
                        </div>
                    </div>

                    <div class="text-right">
                        <div class="input-group">
                            <input type="hidden" name="action" id="action" value="insert"/>
                            <button type="button" class="btn btn-default back">Back</button>
                            <input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Insert"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <footer>
            <script type="text/javascript">
                $(document).ready(function () {
                    var d = new Date();
                    var month = d.getMonth() + 1;
                    var day = d.getDate();

                    var time = d.toLocaleTimeString();
                    var date = d.getFullYear() + '/' +
                        (('' + month).length < 2 ? '0' : '') + month + '/' +
                        (('' + day).length < 2 ? '0' : '') + day;

                    $('#date').val(date);
                    $('#time').val(time);

                    $('#crud_form').on('submit', function (event) {
                        event.preventDefault();
                        if ($('#fullname').val() == '') {
                            alert("Enter Fullname");
                        } else if ($('#date').val() == '') {
                            alert("Enter Date");
                        } else if (!$("input[name='bread']:checked").val()) {
                            alert("Choose Bread");
                        } else if (!$("input[name='sauce']:checked").val()) {
                            alert("Choose Sauce");
                        } else if (!$("input[name='sandwich_type']:checked").val()) {
                            alert("Choose Sandiwch type");
                        } else if (!$("input[name='cheese']:checked").val()) {
                            alert("Choose Cheese");
                        } else if (!$("input[name='veggies']:checked").val()) {
                            alert("Choose Veggies");
                        } else {
                            var form_data = $(this).serialize();
                            $.ajax({
                                url: "action.php",
                                method: "POST",
                                data: form_data,
                                success: function (data) {
                                    if (data == 'insert') {
                                        $(location).attr('href', 'http://localhost/sub-pre-order/work/');
                                        alert("Data Successfully Inserted.");
                                    }
                                }
                            });
                        }
                    });

                    $('.back').click(function () {
                        $(location).attr('href', 'http://localhost/sub-pre-order/work');
                    });
                });
            </script>
        </footer>
    </body>
</html>