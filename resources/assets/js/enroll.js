$(function() {
  $('[data-toggle="tooltip"]').tooltip();

  window.initJqBoostrapValidation = function () {
    $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
  }

  window.destroyJqBootstrapValidation = function () {
    $("input,select,textarea").jqBootstrapValidation("destroy");
  }

  function getUID(prefix) {
    var uid;
    do {
      uid = ~~(Math.random() * 1000000);
      prefix += uid;
    } while (document.getElementById(prefix));
    return uid;
  }

  window.newMemberForm = function() {
    var uid = getUID('prefix');
    return "<div class=\"col-md-4 col-sm-6 col-xs-12 member\" id=\"member" + uid + "\">\n  <div class=\"box\">\n    <div class=\"box-header with-border\">\n      <h3 class=\"box-title\">成员信息</h3>\n      <div class=\"box-tools pull-right\">\n        <button class=\"btn btn-box-tool\" data-widget=\"remove\">\n          <i class=\"fa fa-times\"></i>\n        </button>\n      </div>\n    </div>\n    <div class=\"box-body\">\n      <div class=\"form-group control-group\">\n        <div class=\"controls\">\n          <label>姓名</label>\n          <input type=\"text\" class=\"form-control\" name=\"project[members][" + uid + "][name]\" required data-validation-required-message=\"请填写成员姓名\">\n          <p class=\"help-block text-danger\"></p>\n        </div>\n      </div>\n      <div class=\"form-group control-group\">\n        <div class=\"controls\">\n          <label>年龄</label>\n          <input type=\"text\" class=\"form-control\" name=\"project[members][" + uid + "][age]\" min=\"1\" data-validation-min-message=\"成员年龄不能小于1岁\" pattern=\"\d\" data-validation-pattern-message=\"请填写正确的年龄\" required data-validation-required-message=\"请填写成员年龄\">\n          <p class=\"help-block text-danger\"></p>\n        </div>\n      </div>\n      <div class=\"form-group control-group\">\n        <label>性别</label>\n        <div class=\"controls\">\n          <label class=\"radio-inline\">\n            <input type=\"radio\" name=\"project[members][" + uid + "][sex]\" value=\"0\" checked> 男\n          </label>\n          <label class=\"radio-inline\">\n            <input type=\"radio\" name=\"project[members][" + uid + "][sex]\" value=\"1\"> 女\n          </label>\n          <p class=\"help-block text-danger\"></p>\n        </div>\n      </div>\n      <div class=\"form-group control-group\">\n        <div class=\"controls\">\n          <label>职位</label>\n          <input type=\"text\" class=\"form-control\" name=\"project[members][" + uid + "][title]\" required data-validation-required-message=\"请填写成员职位\">\n          <p class=\"help-block text-danger\"></p>\n        </div>\n      </div>\n      <div class=\"form-group control-group\">\n        <div class=\"controls\">\n          <label>学历</label>\n          <select class=\"form-control\" name=\"project[members][" + uid + "][diploma]\" required data-validation-required-message=\"请选择成员最高学历\">\n            <option value=\"\">请选择最高学历</option>\n            <option value=\"专科\">专科</option>\n            <option value=\"本科\">本科</option>\n            <option value=\"硕士\">硕士</option>\n            <option value=\"博士\">博士</option>\n            <option value=\"其他\">其他</option>\n          </select>\n          <p class=\"help-block text-danger\"></p>\n        </div>\n      </div>\n      <div class=\"form-group control-group\">\n        <div class=\"controls\">\n          <label>毕业院校</label>\n          <input type=\"text\" class=\"form-control\" name=\"project[members][" + uid + "][academy]\" required data-validation-required-message=\"请填写成员毕业院校\">\n          <p class=\"help-block text-danger\"></p>\n        </div>\n      </div>\n      <div class=\"form-group control-group\">\n        <div class=\"controls\">\n          <label>简介</label>\n          <textarea class=\"form-control\" name=\"project[members][" + uid + "][description]\" required rows=\"10\" data-validation-required-message=\"请填写成员简介\"></textarea>\n          <p class=\"help-block text-danger\"></p>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>";;
  }

  function listenClickEventOnNewMemberButton() {
    $('#new-member').click(function(event) {
      event.preventDefault();

      $('.members').append(window.newMemberForm());
      window.destroyJqBootstrapValidation();
      window.initJqBoostrapValidation();
    });
  }

  function listenClickEventOnRemoveMemberButton() {
    $('.members').delegate('[data-widget=remove]', 'click', function(event) {
      event.preventDefault();

      $(this).closest('.member').slideUp('normal', function () {
        $(this).remove();
      });
    });
  }

  function initSingleAvatar() {
    $('input.fileupload.avatar').fileinput({
      language         : 'zh',
      previewFileType  : 'image',
      allowedFileTypes : [ 'image' ],
      showUpload       : false,
      showCancel       : false
    });
  }

  function initMultipleAvatars() {
    $('input.fileupload.avatars').fileinput({
      language         : 'zh',
      uploadUrl        : '/attachments/upload',
      uploadAsync      : true,
      maxFileCount     : 5
    });
  }

  function init() {
    window.initJqBoostrapValidation();

    listenClickEventOnNewMemberButton();
    listenClickEventOnRemoveMemberButton();

    initSingleAvatar();
    initMultipleAvatars();
  }

  init();
});
