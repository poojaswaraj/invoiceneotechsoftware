function setUpdateAction() {
document.frmUser.action = "edit_user.php";
document.frmUser.submit();
}
function setDeleteAction() {
if(confirm("Are you sure want to delete these rows?")) {
document.frmUser.action = "multiple_del_invoice.php";
document.frmUser.submit();
}
}