$(function() {
  $("input,textarea").not("[type=submit]").jqBootstrapValidation({
    preventSubmit: true
  });
});
