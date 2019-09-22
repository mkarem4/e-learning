//MOhammed Reda Trika
function sendforgetemail(op) {
    if (document.getElementById('email').value) {
        document.getElementById('formresetsubmit').submit();
    } else {

        addremovespnHtml('spn_email', (langs == 'en' ? '* Please Enter an Email or User Name' : 'من فضلك ادخل بريدك الالكتروني او اسم المستخدم'))
        addRemoveclass('email', "vald_txt", 'add');
    }
}
function sendcodetomail(op) {
    if (validateEmail()) {
        addremovespnHtml('spn_email');
        var obj = {
            email: document.getElementById("email").value
        };

        $.ajax({
            url: document.getElementById("forgetpasswordurl").value,
            type: 'post',
            data: JSON.stringify(obj),
            contentType: 'application/json',
            async: false,
            cache: false,
            processData: false,
            success: function (data) {

            }
        });

    }
}
var langs = document.getElementById('getlang').value;
function signup() {
    if (validatesignup())
        ajaxcallPost('postregister');
}
function signin() {
    if (validatesignin())
        ajaxcallPost('signin');
}

function existusername(op) {
    addremovespnHtml('spn_username');
    var obj = {
        username: document.getElementById("username").value
    };
    if (document.getElementById('useridoflogin'))
        obj['userid'] = document.getElementById("useridoflogin").value;
    var valid = true;
    $.ajax({
        //        headers: {
        //            'X-CSRF-TOKEN': document.getElementsByName('_token')[0].value
        //        },
        url: document.getElementById("existusernameurl").value,
        type: 'post',
        data: JSON.stringify(obj),
        contentType: 'application/json',
        async: false,
        cache: false,
        processData: false,
        success: function (data) {
            if (data == '1') {
                valid = false;

                addremovespnHtml('spn_username', (langs == 'en' ? 'Username is exist' : ' اسم المستخدم موجود من قبل'))
            }
        }
    });

    return valid;
}

function existemail(op) {
    addremovespnHtml('spn_email');
    var obj = {
        email: document.getElementById("email").value
    };
    if (document.getElementById('useridoflogin'))
        obj['userid'] = document.getElementById("useridoflogin").value;
    var valid = true;
    $.ajax({
        //        headers: {
        //            'X-CSRF-TOKEN': document.getElementsByName('_token')[0].value
        //        },
        url: document.getElementById("existemailurl").value,
        type: 'post',
        data: JSON.stringify(obj),
        contentType: 'application/json',
        async: false,
        cache: false,
        processData: false,
        success: function (data) {
            if (data == '1') {
                valid = false;

                addremovespnHtml('spn_email', (langs == 'en' ? 'Email is exist' : 'البريد الالكتروني موجود من قبل'))
            }
        }
    });

    return valid;
}
function backtolink(href) {
    location.href = href;
}
$("#groupImgAdd").change(function () {
    readURL(this);
});
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imgsrc').attr('src', e.target.result);
            if (document.getElementById('imghead'))
                $('#imghead').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function updateimgprofile(e, his) {
    if (e == 0 || his.value) {
        var lang = document.getElementById('currentlang').value;
        if (e == 0) {
            document.getElementById('imgsrc').src = "/website/imgs/profile.jpg";
            if (document.getElementById('imghead'))
                document.getElementById('imghead').src = "/website/imgs/profile.jpg";

            document.getElementById('removeimg').style.display = 'none';
            document.getElementById('groupImgAdd').style.display = 'block';
            document.getElementById('lbl_for').htmlFor = 'groupImgAdd';
            document.getElementById('lbl_for').innerText = 'Upload Image';
            if (lang == 'ar') {
                document.getElementById('lbl_for').innerText = 'رفع صوره';
            }
        } else {
            document.getElementById('removeimg').style.display = 'block';
            document.getElementById('groupImgAdd').style.display = 'none';
            document.getElementById('lbl_for').htmlFor = 'removeimg';

            document.getElementById('lbl_for').innerText = 'Remove Image';
            if (lang == 'ar') {
                document.getElementById('lbl_for').innerText = 'مسح الصوره';
            }
        }
        var form = $('#signinforms')[0];
        var url = $('#signinforms').attr('action')
        var obj = new FormData(form);
        $.ajax({
            url: url,
            type: 'post',
            _method: 'post',
            dataType: 'json',
            data: obj,
            processData: false,
            contentType: false,
            success: function (data) {
                debugger;

            }
        });
    }
}

function updateprofile(e) {
    if (validupdateprofile()) {
        var form = $('#signinform')[0];
        var url = $('#signinform').attr('action')
        var obj = new FormData(form);
//    if (e)
//        e.disabled = true;
        $.ajax({
            url: url,
            type: 'post',
            _method: 'post',
            dataType: 'json',
            data: obj,
            processData: false,
            contentType: false,
            success: function (data) {
                debugger;
                backtolink(document.getElementById('profileurl').value);

            }
        });
    }
}
function validupdateprofile() {
    return validatefsName() & validateSecName() & (validateUsername() & existusername()) & validateKey() & validatePhone() & (validateEmail() && existemail('existemail'));

}
function ajaxcallPost(op) {

//    if (op == 'signin') {
//        var form = $(document.getElementById("signinform"));
    var formData = $("#signinform").serialize();
    var url = $('#signinform').attr('action')
//        var obj = {
//            email: document.getElementById("email").value,
//            password: document.getElementById("password").value
//        };
//    } else
//        var obj = {
//            fsname: document.getElementById("fsname").value,
//            secname: document.getElementById("secname").value,
//            username: document.getElementById("username").value,
//            email: document.getElementById("email").value,
//            key: document.getElementById("key").value,
//            phone: document.getElementById("phone").value,
//            password: document.getElementById("password").value,
//            password_confirmation: document.getElementById("confirmation_password").value
//        };
    $.ajax({
//        headers: {
//            'X-CSRF-TOKEN': document.getElementsByName('_token')[0].value,
//            'Authorization': document.getElementsByName('_token')[0].value,
//            //'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'
//            //'Authorization': document.getElementById("access_token").value,
//        },
        url: url, //document.getElementById("signinurl").value,
        type: 'post',
            dataType: 'json',
        data: formData,
        dataType: 'json',
        success: function (data) {
            switch (op) {
                case 'postregister':
                    cleartxt();
                    document.getElementById('feedback').style.display = 'block';

                    break;
                case 'signin':
                    addremovespnHtml('spn_login')
                    if(data == '1')
                         location.href = '/';
                     else
                    addremovespnHtml('spn_login', data);
//                    if (data == '0') {
//                        addremovespnHtml('spn_login', (langs == 'en' ? 'This account deactivated now, Kindly Contact your Administrator' : 'من فضلك قم يتفعيل حسابك'));
//                    } else if (data == '2') {
//                        addremovespnHtml('spn_login', (langs == 'en' ? 'Please  Enter Valid Data' : 'البريد الالكتروني او كلمة المرور غير صحيحه'));
//                    } else
//                    {
//                        location.href = '/';
////                        debugger
////                        $.ajax({
////                            headers: {
////                                'X-CSRF-TOKEN': document.getElementsByName('_token')[0].value
////                            },
////                            url: '/afterlogin',
////                            type: 'post',
////                            data: {
////                                id: data.id
////                            },
////                            dataType: 'json',
////                            success: function (data) {
////                                location.href = '/';
////                            }
////
////                        });
//                    }
                    //
                    break;
                default:

                    break;
            }
        }
    }
    );
}
function hidefeed() {
    document.getElementById('feedback').style.display = 'none';
}
//function ajaxcallPost(op) {
//    if (op == 'signin')
//        var obj = {
//            email: document.getElementById("email").value,
//            password: document.getElementById("password").value
//        };
//
//    else
//        var obj = {
//            fsname: document.getElementById("fsname").value,
//            secname: document.getElementById("secname").value,
//            username: document.getElementById("username").value,
//            email: document.getElementById("email").value,
//            key: document.getElementById("key").value,
//            phone: document.getElementById("phone").value,
//            password: document.getElementById("password").value,
//            password_confirmation: document.getElementById("confirmation_password").value
//        };
//    $.ajax({
//        headers: {
//            'X-CSRF-TOKEN': document.getElementsByName('_token')[0].value
//        },
//        url: '/' + op,
//        type: 'post',
////            dataType: 'json',
//        data: JSON.stringify(obj),
//        contentType: 'application/json',
//        cache: false,
//        processData: false,
//        success: function (data) {
//            switch (op) {
//                case 'postregister':
//                    cleartxt();
//                    document.getElementById('feedback').style.display = 'block';
////                    setTimeout(function () {
////                        document.getElementById('feedback').style.display = 'none';
////
////                    }, 2000)
//                    break;
//
//                case 'signin':
//                    addremovespnHtml('spn_login')
//                    if (data == '0') {
//                        addremovespnHtml('spn_login', 'Please Active Your Account');
//                    } else if (data == '2') {
//                        addremovespnHtml('spn_login', 'Please Enter Valid Data');
//                    } else
//                        location.href = '/';
//                    break;
//
//                default:
//
//                    break;
//            }
//        }
//    });
//}

function cleartxt() {
    document.getElementById("fsname").value = '';
    document.getElementById("secname").value = '';
    document.getElementById("username").value = '';
    document.getElementById("email").value = '';
    document.getElementById("key").value = '';
    document.getElementById("phone").value = '';
    document.getElementById("password").value = '';
    document.getElementById("confirmation_password").value = '';
    document.getElementById('fsname').classList.remove('is-valid');
    document.getElementById("secname").classList.remove('is-valid');
    document.getElementById("username").classList.remove('is-valid');
    document.getElementById("email").classList.remove('is-valid');
    document.getElementById("key").classList.remove('is-valid');
    document.getElementById("phone").classList.remove('is-valid');
    document.getElementById("password").classList.remove('is-valid');
    document.getElementById("confirmation_password").classList.remove('is-valid');

}
function validatesignup() {
    return validatefsName() & validateSecName() & (validateUsername() & existusername()) & validateKey() & validatePhone() & validatePassword()
            & validateConfirmPassword() & (validateEmail() && existemail('existemail'));
}


function validateCountryId() {
    if (document.getElementById("countries").value)
    {
        addremovespnHtml('country_id_error')
        return true;
    } else {
        return false;
    }
}

function validateCityId() {
    if (document.getElementById("cities").value)
    {
        addremovespnHtml('city_id_error')
        return true;
    } else {
        return false;
    }
}

function validateRestaurantArName() {
    if (document.getElementById("ar_name").value)
    {
        addremovespnHtml('ar_name_error')
        return true;
    } else {
        return false;
    }
}

function validateRestaurantEnName() {
    if (document.getElementById("en_name").value)
    {
        addremovespnHtml('en_name_error')
        return true;
    } else {
        return false;
    }
}

function validateNoOfBranches() {
    if (document.getElementById("no_of_branches").value)
    {
        addremovespnHtml('no_of_branches_error')
        return true;
    } else {
        return false;
    }
}


function validateTypes() {
    if (document.getElementById("business_type_ids").value)
    {
        addremovespnHtml('business_type_ids_error')
        return true;
    } else {
        return false;
    }
}


function validateIcon() {
    if (document.getElementById("inputGroupFile01").files.length == 0)
    {
        alert('error');
        addremovespnHtml('icon_error')
        addRemoveclass('email', "vald_txt", 'remove');
        return true;
    } else {
        $('#icon_error').hide();
        return false;
    }
}

function validateFacebook() {
    if (document.getElementById("facebook").value)
    {
        addremovespnHtml('facebook_error')
        return true;
    } else {
        return false;
    }
}


function validateTwitter() {
    if (document.getElementById("twitter").value)
    {
        addremovespnHtml('twitter_error')
        return true;
    } else {
        return false;
    }
}


function validateInstagram() {
    if (document.getElementById("instagram").value)
    {
        addremovespnHtml('instagram_error')
        return true;
    } else {
        return false;
    }
}
function validateRestaurantId() {
    if (document.getElementById("validate_restaurant_id").value)
    {
        addremovespnHtml('restaurant_id_error')
        return true;
    } else {
        return false;
    }
}

function validatePositionId() {
    if (document.getElementById("validate_position_id").value)
    {
        addremovespnHtml('position_id_error')
        return true;
    } else {
        return false;
    }
}


function validateFirstName() {


    if (document.getElementById("fsname").value && document.getElementById("fsname").value.length > 3)
    {
        addremovespnHtml('first_name_error')
        addRemoveclass('fsname', "vald_txt", 'remove');
        return true;
    } else {
        addremovespnHtml('first_name_error', (langs == 'en' ? 'Please Enter Your First Name (at least 3 characters)' : 'من فضلك ادخل الاسم الاول (يجب إدخال ٣ حروف علي الأقل)'))
        addRemoveclass('fsname', "vald_txt", 'add');
        return false;
    }
}


function validateLastName() {
    if (document.getElementById("lsname").value && document.getElementById("lsname").value.length > 3)
    {
        addremovespnHtml('last_name_error')
        addRemoveclass('lsname', "vald_txt", 'remove');
        return true;
    } else {
        addremovespnHtml('last_name_error', (langs == 'en' ? 'Please Enter Your Last Name (at least 3 characters)' : 'من فضلك ادخل الاسم الاخير (يجب إدخال ٣ حروف علي الأقل)'))
        addRemoveclass('lsname', "vald_txt", 'add');
        return false;
    }
}

function validateEmailInContact() {
    if (document.getElementById("email").value && isvalidateEmail())
    {
        addremovespnHtml('email_error')
        addRemoveclass('email', "vald_txt", 'remove');
        return true;
    } else {
        addRemoveclass('email', "vald_txt", 'add');
        return false;
    }
}


function validatePhoneInContact() {
    if (document.getElementById("phone").value && document.getElementById("phone").value.length > 5 && document.getElementById("phone").value.length < 12)
    {
        addremovespnHtml('phone_number_error')
        addRemoveclass('phone', "vald_txt", 'remove');
        return true;
    } else {
        addremovespnHtml('phone_number_error', (langs == 'en' ? 'Please Enter You Key and Correct Phone Number' : 'من فضلك ادخل رقم الهاتف الصحيح ومفتاح الدوله'))
        addRemoveclass('phone', "vald_txt", 'add');
        return false;
    }
}

function validateKeyInContact() {
    if (document.getElementById("key"))
    {
        addremovespnHtml('phone_number_code_error')
        addRemoveclass('key', "vald_txt", 'remove');
        return true;

    } else {
        addremovespnHtml('phone_number_code_error', (langs == 'en' ? 'Please Enter You Key and Phone Number' : 'من فضلك ادخل رقم الهاتف ومفتاح الدوله'))
        addRemoveclass('key', "vald_txt", 'add');
        return false;
    }
}

function validateMessage() {
    if (document.getElementById("message").value && document.getElementById("message").value.length > 5)
    {
        addremovespnHtml('message_error')
        addRemoveclass('message', "vald_txt", 'remove');
        return true;
    } else {
        addremovespnHtml('message_error', (langs == 'en' ? 'Please Enter Your Message (at least 5 characters)' : 'من فضلك ادخل رسالتك (يجب إدخال ٥ حروف علي الأقل)'))
        addRemoveclass('message', "vald_txt", 'add');
        return false;
    }
}


function validatefsName() {
    if (document.getElementById("fsname").value)
    {
        addremovespnHtml('spn_fsname')
        addRemoveclass('fsname', "vald_txt", 'remove');
        return true;
    } else {
        addremovespnHtml('spn_fsname', (langs == 'en' ? 'Please Enter Your First Name' : 'من فضلك ادخل الاسم الاول'))
        addRemoveclass('fsname', "vald_txt", 'add');
        return false;
    }
}

function validateSecName() {
    if (document.getElementById("secname").value)
    {
        addremovespnHtml('spn_secname')
        addRemoveclass('secname', "vald_txt", 'remove');
        return true;
    } else {
        addremovespnHtml('spn_secname', (langs == 'en' ? 'Please Enter Your Second Name' : 'من فضلك ادخل الاسم الاخير'))
        addRemoveclass('secname', "vald_txt", 'add');
        return false;
    }
}

function validatesignin() {
    return validatePassword() & validateEmailsignin();
}


function validateEmailsignin() {
    if (document.getElementById("email").value)
    {
        addremovespnHtml('spn_email')
        addRemoveclass('email', "vald_txt", 'remove');
        return true;
    } else {
        addremovespnHtml('spn_email', (langs == 'en' ? 'Please Enter You Email' : 'من فضلك ادخل بريدك الالكتروني'))
        addRemoveclass('email', "vald_txt", 'add');
        return false;
    }
}

function validateConfirmPassword() {
    if (document.getElementById("confirmation_password").value && confirmpassword())
    {
        addremovespnHtml('spn_confirmation_password')
        addRemoveclass('confirmation_password', "vald_txt", 'remove');
        return true;
    } else {

        addremovespnHtml('spn_confirmation_password', (langs == 'en' ? 'Please Confirm You Password' : 'من فضلك اكد كلمة المرور'))
        addRemoveclass('confirmation_password', "vald_txt", 'add');
        return false;
    }
}

function validatePassword() {
    if (document.getElementById("password").value && document.getElementById("password").value.length > 5)
    {

        addremovespnHtml('spn_password')
        addRemoveclass('password', "vald_txt", 'remove');
        return true;
    } else {

        addremovespnHtml('spn_password', (langs == 'en' ? 'Please Enter You Password 6 character or more' : 'من فضلك ادخل 6 حروف او اكثر'))
        addRemoveclass('password', "vald_txt", 'add');
        return false;
    }
}
function confirmpassword() {
    return  document.getElementById('password').value == document.getElementById('confirmation_password').value;
}
function validatePhone() {
    if (document.getElementById("phone").value)
    {
        addremovespnHtml('spn_phone')
        addRemoveclass('phone', "vald_txt", 'remove');
        return true;
    } else {
        addremovespnHtml('spn_phone', (langs == 'en' ? 'Please Enter You Key and Phone Number' : 'من فضلك ادخل رقم الهاتف ومفتاح الدوله'))
        addRemoveclass('phone', "vald_txt", 'add');
        return false;
    }
}


function validateKey() {
    if (document.getElementById("key").value)
    {
        addremovespnHtml('spn_phone')
        addRemoveclass('key', "vald_txt", 'remove');
        return true;
    } else {
        addremovespnHtml('spn_phone', (langs == 'en' ? 'Please Enter You Key and Phone Number' : 'من فضلك ادخل رقم الهاتف ومفتاح الدوله'))
        addRemoveclass('key', "vald_txt", 'add');
        return false;
    }
}
function validateEmail() {
    if (document.getElementById("email").value && isvalidateEmail())
    {
        addremovespnHtml('spn_email')
        addRemoveclass('email', "vald_txt", 'remove');
        return true;
    } else {
        addRemoveclass('email', "vald_txt", 'add');
        return false;
    }
}



function isvalidateEmail() {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(document.getElementById("email").value);
}

function validateName() {
    if (document.getElementById("name").value)
    {
        addremovespnHtml('spn_name')
        addRemoveclass('name', "vald_txt", 'remove');
        return true;
    } else {
        addremovespnHtml('spn_name', (langs == 'en' ? 'Please Enter Your Name' : 'من فضلك ادخل الاسم'))
        addRemoveclass('name', "vald_txt", 'add');
        return false;
    }
}
function validateUsername() {
    if (document.getElementById("username").value)
    {
        addremovespnHtml('spn_username')
        addRemoveclass('username', "vald_txt", 'remove');
        return true;
    } else {
        addremovespnHtml('spn_username', (langs == 'en' ? 'Please Enter Your Username' : 'من فضلك ادخل اسم المستخدم'))
        addRemoveclass('username', "vald_txt", 'add');
        return false;
    }
}
function addremovespnHtml(id, txt) {
    document.getElementById(id).style.display = txt ? 'block' : 'none';
    document.getElementById(id).innerHTML = txt;
}
function addRemoveclass(id, clas, is) {

    var list = document.getElementById(id).classList;
    if (is == 'add') {
        list.add(clas);
        list.add('is-invalid');
        list.remove('is-valid');
    } else {
        list.remove(clas);
        list.add('is-valid');
        list.remove('is-invalid');
    }
}

