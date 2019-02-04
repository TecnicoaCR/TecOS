$(document).ready(function () {
    $("#use-salt-checkbox").change(function () {
        var saltInput = $("#salt-input");
        saltInput.prop("disabled", !$(this).prop("checked"));
        saltInput.prop("placeholder", $(this).prop("checked") ? "" : "Auto generated");
        console.log($(this).val());
        if ($(this).prop("checked") || saltInput.val() != "") {
            saltInput.addClass("code-input");
        } else {
            saltInput.removeClass("code-input");
        }
    });

    $("#use-cost-checkbox").change(function () {
        $("#cost-input").prop("disabled", !$(this).prop("checked"));
    });

    $(".select-all").select();

    $("#clear-button", "#password-hash-form").click(function() {
        var passwordsTextarea = $("#passwords-textarea", "#password-hash-form");
        passwordsTextarea.val("");
        passwordsTextarea.focus();
    });

    $("#clear-button", "#password-verify-form").click(function() {
        $("#passwords-textarea", "#password-verify-form").val("");
        $("#hashes-textarea", "#password-verify-form").val("");
        $("#passwords-textarea", "#password-verify-form").focus();
    });

    $("#password-verify-form").submit(function (event) {
        var passwords = $("#passwords-textarea", "#password-verify-form").val();
        var hashes = $("#hashes-textarea", "#password-verify-form").val();
        if (countLines(passwords) !== countLines(hashes)) {
            event.preventDefault();
            $("#differing-count-alert").show();
        }
    });

    $("#differing-count-alert-close-button").click(function() {
        $(this).parents(".alert").first().hide();
    });

    $("#clear-button", "#password-get-info-form").click(function() {
        var hashesTextarea = $("#hashes-textarea", "#password-get-info-form");
        hashesTextarea.val("");
        hashesTextarea.focus();
    });

    $("#clear-button", "#password-needs-rehash-form").click(function() {
        var hashesTextarea = $("#hashes-textarea", "#password-needs-rehash-form");
        hashesTextarea.val("");
        hashesTextarea.focus();
    });
});

function countLines(string) {
    return string.split(/\r\n|\r|\n/).length;
}