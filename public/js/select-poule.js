 $(document).ready(function () {

                    $("#addButton").click(function () {
                        if( ($('.form-horizontal form-bordered').length+1) > 10) {
                            alert("Le nomnbre de poules maximales est de 10");
                            return false;
                        }
                        var poule = ['A','B','C','D','E','F','G','H','I','J'];
                        var id = ($('.form-group').length).toString(); //var id = ($('.form-group').length + 1).toString();
                        $('.form-horizontal').append('<div class="form-group remove"><label class="control-label col-md-4"> Selection des équipes pour la <code> Poule '+ poule[id] +' </code></label><div class="col-md-8"><select class="demo-cs-multiselect" data-placeholder="Taper le nom de l\'équipe..." multiple tabindex="4"><option value="United States">United States</option><option value="United Kingdom">United Kingdom</option><option value="Afghanistan">Afghanistan</option> </select></div></div>');
                    });

                    $("#removeButton").click(function () {
                        if ($('.form-horizontal .control-group').length == 1) {
                            alert("Rien à supprimer");
                            return false;
                        }
                        $('.remove:last').remove();
                    });
                });