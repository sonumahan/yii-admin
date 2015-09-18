/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var apiUrl = "http://api.railsapi.com:3000/";
var Util = {
    _ajax : function(url,type,dataType,data,extraData,handler) {
        url = apiUrl+url || "";
        type = type || "POST";
        dataType = dataType || "json";
        data = data || {};
        extraData = extraData || {};
        handler = handler || Util._noHandler;
        var request = $.ajax({
            url: url,
            type: type,
            dataType: dataType,
            data: data,
            crossDomain:true,
            contentType: false,
            processData: false,
            xhrFields: {
                withCredentials: true
            },
            headers: {
                'Accept':"application/vnd.marketplace.v1",
                'Authorization' : "Token 04acb5b76d4bd0724bbe5c1574211480"
            }
                
        });
        request.done(function( response ) {
            handler(response,extraData);
        });
        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    },
    /*_noHandler : function(response,extraData) {
        console.log(response);
        return response;
    }, */
    _formatDate : function(date) {
        date = date || "";
        if(date.length && date !== null && typeof date === "string") {
            var newDate = new Date(date);
            var month = newDate.getMonth();
            var day = newDate.getDate();
            month = month + 1;
            day = day + "";
            month = month + "";
            month = (month.length === 1) ? "0"+month : month;
            day = (day.length === 1) ? "0"+day : day;
            return [month,day,newDate.getFullYear()].join('/');
        }else {
            return "00/00/0000";
        }  
    },
    _checkAll : function(div) {
        $("#"+div).find('input[type="checkbox"]').removeAttr('checked');
        $("#"+div).find('input[type="checkbox"]').prop('checked', true);
    },
    _unCheckAll : function(div) {
        $("#"+div).find('input[type="checkbox"]').prop('checked', false);
    },
    _handleAjaxResponse : function(data,extraData) {
        var fieldAr = {
          'organization_name' : {'label' : 'Partner','sort' : 'yes'},
          'username' : {'label' : 'Username','sort' : 'yes'},
          'active_status' : {'label' : 'Status','sort' : 'yes'},
          'last_login' : {'label' : 'Last Login','sort' : 'yes'},
          'partner_opportunities_count' : {'label' : 'No. of Positions','sort' : 'yes'},
          'partner_reviews_count' : {'label' : 'No. of Reviews','sort' : 'yes'},
          'action' : {'label' : 'action','sort' : 'no'}
        };
        var content = "";
        var headerCon = Util._processHeader(fieldAr,"partnerListingForm","plist",data.sort,data.sort_by,'Util._handleAjaxResponse');
        content += headerCon;
        
        $.each(data.artists,function(index,value) {
            content += "<tr id='prtner_"+value.id+"'>";
                content += '<td>'+value.organization_name+'</td>';
                content += '<td>'+value.username+'</td>';
                content += '<td>'+value.active_status+'</td>';
                content += '<td>'+value.last_login+'</td>';
                content += '<td>'+value.partner_opportunities_count+'</td>';
                content += '<td>'+value.partner_reviews_count+'</td>';
                content += '<td><div class="tools"><a href="/admin/partner/edit/'+value.id+'"><i class="fa fa-edit"></i></a><a href="javascript:void(0)" onclick="Util._deleteData(\'partners/'+value.id+'\',\'DELETE\',\'partner_'+value.id+'\',\'3\',this)"><i class="fa fa-trash-o"></i></a></div></td>';
            content += "</tr>";
        });
        var paging = Util._createPagination(data.current_page,data.total_page,'plist','partnerListingForm','Util._handleAjaxResponse');
        content += "<tr><td colspan='5'>"+paging+"</td></tr>";
        $("#partnerListing").find("table").html(content);
    },
    _handleVolunteerAjaxResponse : function(data,extraData) {
        var fieldAr = {
          'first_name' : {'label' : 'First Name','sort' : 'yes'},
          'last_name' : {'label': 'Last Name','sort':'yes'},
          'user_name' : {"label": "Username","sort" : "yes"},
          'password' : {"label" : "Password","sort": "no"},
          'validated' : {"label" : "Status","sort": "yes"},
          'date_added' : {'label': 'Added Date','sort':'yes'},
          'last_login' : {'label': 'Last Login Date','sort':'yes'},
          'action' : {'label':'Action','sort':'no'}
        };
        var content = "";
        var headerCon = Util._processHeader(fieldAr,"volunteerListingForm","volunteer",data.sort,data.sort_by,'Util._handleVolunteerAjaxResponse');
        content += headerCon;
        
        $.each(data.volunteers,function(index,value) {
            content += "<tr id='volunteer_"+value.id+"'>";
                content += '<td>'+value.first_name+'</td>';
                content += '<td>'+value.last_name+'</td>';
                content += '<td>'+value.username+'</td>';
                if(value.readable_password.length) {
                    content += '<td>'+value.readable_password+'</td>';
                }else {
                    content += '<td>&nbsp;</td>';
                }
                var validated = (value.validated === "1") ? "Active" : "Deactive";
                content += '<td>'+validated+'</td>';
                content += '<td>'+Util._formatDate(value.date_added)+'</td>';
                content += '<td>'+Util._formatDate(value.last_login)+'</td>';
                content += '<td><div class="tools"><a href="/admin/volunteer/edit/'+value.id+'"><i class="fa fa-edit"></i></a><a href="javascript:void(0)" onclick="Util._deleteData(\'volunteer/'+value.id+'\',\'DELETE\',\'volunteer_'+value.id+'\',\'5\',this)"><i class="fa fa-trash-o"></i></a></div></td>';
            content += "</tr>";
        });
        var paging = Util._createPagination(data.current_page,data.total_page,'volunteer','volunteerListingForm','Util._handleVolunteerAjaxResponse');
        content += "<tr><td colspan='8'>"+paging+"</td></tr>";
        $("#volunteerLisiting").find("table").html(content);
    },
    _handleGrantAjaxResponse : function(data,extraData){
        var fieldAr = {
            'volunteer_name': {"label": "Volunteer","sort": "no"},
            'title' : {"label": "Title","sort":"yes"},
            'status' : {"label": "Status","sort":"yes"},
            'action' :{"label" : "Action","sort":"no"}
        };
        var content = "";
        var headerCon = Util._processHeader(fieldAr,"volunteerGrantListingForm","grant_recipient",data.sort,data.sort_by,'Util._handleGrantAjaxResponse');
        content += headerCon;
        $.each(data.grants,function(i,value) {
            content += "<tr id='grant_"+value.id+"'>";
                content += '<td>'+[value.volunteer.first_name,value.volunteer.last_name].join(' ')+'</td>';
                content += '<td>'+value.title+'</td>';
                var status = (value.status === true) ? "Active" : "Deleted";
                content += '<td>'+status+'</td>';
                content += '<td><div class="tools"><a href="/admin/grant/edit/'+value.id+'"><i class="fa fa-edit"></i></a><a onclick="Util._deleteData(\'grant_recipient/'+value.id+'\',\'DELETE\',\'volunteer_'+value.id+'\',\'3\',this)" href="javascript:void(0)"><i class="fa fa-trash-o"></i></a></div></td>';
            content += "</tr>";
            
        });
        var paging = Util._createPagination(data.current_page,data.total_page,'grant_recipient','volunteerGrantListingForm','Util._handleGrantAjaxResponse');
        content += "<tr><td colspan='4'>"+paging+"</td></tr>";
        $("#volunteerGrantLisiting").find("table").html(content);
    },
    _ajaxRatingHandle : function(data,extraData) {
        var fieldAr = {
          'volunteer' : {"label":'Volunteer',"sort":"no"},
          'partner' : {"label": "Partner","sort":"no"},
          "title" : {"label":"Subject","sort":"yes"},
          "date_added" : {"label":"Review Date","sort":"yes"},
          "action" : {"label":"Action","sort":"no"}
        };
        var content = "";
        var headerCon = Util._processHeader(fieldAr,"partnerRatingListingForm","ratings",data.sort,data.sort_by,'Util._ajaxRatingHandle');
        content += headerCon;
        $.each(data.ratings,function(i,value) {
            content += "<tr id='rating_"+value.id+"'>";
            var volunteer = (typeof value.volunteer !== "undefined") ? [value.volunteer.first_name,value.volunteer.last_name].join(' ') : "";
            content += '<td>'+volunteer+'</td>';
            var partner = (typeof value.partner !== "undefined") ? value.partner.organization_name : "";
            content += '<td>'+partner+'</td>';
            content += '<td>'+value.title+'</td>';
            content += '<td>'+Util._formatDate(value.date_added)+'</td>';
            content += '<td><a href="/admin/rating/edit/'+value.id+'"><i class="fa fa-edit"></i></a></td>';
            content += "<tr>";
        });
        var paging = Util._createPagination(data.current_page,data.total_page,'ratings','partnerRatingListingForm','Util._ajaxRatingHandle');
        content += "<tr><td colspan='5'>"+paging+"</td></tr>";
        $("#partnerRatingListing").find("table").html(content);
    },
    _createPagination : function(cPage,tPage,url,formName,methods) {
        var paging = '<div class="box-tools pull-right"><ul class="pagination pagination-sm inline">';
        for(var i=1;i <= tPage;i++) {
            var classA = (i === cPage) ? ' class="active"' : "";
            paging += "<li"+classA+"><a href='javascript:void(0)' onclick='Util._processPagination(\""+i+"\",\""+url+"\",\""+formName+"\","+methods+");'>"+i+"</a></li>";
        }
        paging += "</ul></div>";
        return paging;
    },
    _processPagination : function(pageNum,url,formName,method) {
        $("#"+formName).find("#page").val(pageNum);
        Util._ajax(url,'GET','json',$('#'+formName).serialize(),'',method);
    },
    _processSorting : function(url,formName,fieldName,fieldOrder,method) {
        $("#"+formName).find("#sort").val(fieldName);
        $("#"+formName).find("#sort_by").val(fieldOrder);
        Util._ajax(url,'GET','json',$('#'+formName).serialize(),'',method);
    },
    _processHeader : function(data,formName,url,paramField,paramSort,method) {
        var nextSort = (paramSort === "asc") ? "desc" : "asc";
        var sortClass = (paramSort === "asc") ? "glyphicon glyphicon-sort-by-attributes" : "glyphicon glyphicon-sort-by-attributes-alt";
        var headerCon = "<tr>";
        $.each(data,function(index,value) {
            if(value["sort"] === "yes") {
                var sortFied = (typeof value["association"] !== "undefined") ? value["association"]+"."+index : index;
                if(paramField === sortFied) {
                    headerCon += "<th><a href='javascript:void(0)' onclick='Util._processSorting(\""+url+"\",\""+formName+"\",\""+sortFied+"\",\""+nextSort+"\","+method+");'>"+value["label"]+"<span class='"+sortClass+"'></span></a></th>";
                }else {
                    headerCon += "<th><a href='javascript:void(0)' onclick='Util._processSorting(\""+url+"\",\""+formName+"\",\""+sortFied+"\",\"asc\","+method+");'>"+value["label"]+"<span class='glyphicon glyphicon-sort-by-attributes'></span></a></th>";
                }
                
            }else {
                headerCon += "<th>"+value["label"]+"</th>";
            }
            
        });
        headerCon += "</tr>";
        return headerCon;
    },
    _addFunctionProcess : function(data,extraData) {
        var editorIn = [];
        var encType = (typeof extraData.fileUpload !== "undefined") ? " enctype = 'multipart/form-data'" : "";
        var fCon = '<div class="row"><div class="col-md-12"><div class="box box-info"><form role="form" action="'+extraData.formUrl+'" id="'+extraData.formId+'"'+encType+'><div class="box-body">';
        $.each(extraData,function(index,value) {
            if(typeof value["type"] !== "undefined") {
                var newName = extraData.fieldWrapper+'['+index+']';
                fCon += '<div class="form-group">';
                    if(value["type"] !== "hidden") {
                        fCon += '<label for="'+index+'">'+value["label"]+'</label>';
                    }
                    if(value["type"] === "text") {
                        fCon += '<input id="'+index+'" class="form-control" type="'+value["type"]+'" placeholder="Enter '+value["label"]+'" name="'+newName+'" value="">';
                    }
                    if(value["type"] === "hidden") {
                        var val = (typeof value["value_from"] !== "undefined") ? value["value_from"] : "";
                        fCon += '<input id="'+index+'" class="form-control" type="'+value["type"]+'" placeholder="Enter '+value["label"]+'" name="'+newName+'" value="'+val+'">';
                    }
                    if(value["type"] === "file") {
                        fCon += '<input id="'+index+'"  type="'+value["type"]+'" name="'+newName+'" value="">';
                    }
                    if(value["type"] === "password") {
                        fCon += '<input id="'+index+'" class="form-control" type="'+value["type"]+'" placeholder="Enter '+value["label"]+'" name="'+newName+'" value="">';
                    }
                    if(value["type"] === "textarea") {
                        fCon += '<textarea class="form-control" placeholder="Enter '+value["label"]+'" rows="3" id="'+index+'" name="'+newName+'"> </textarea>';
                        editorIn.push(index);
                    }
                    if(value["type"] === "multiple") {
                        fCon += '<select name="'+newName+'[]" id="'+index+'" class="form-control" multiple="multiple">';
                        if(index === "regions_of_interest") {
                            $.each(data.regions,function(sIn,sVal) {
                                fCon += '<option value="'+sVal.id+'">'+sVal.title+'</option>';
                            });
                        }
                        
                        if(index === "skills") {
                           $.each(data.skills,function(sIn,sVal) {
                                fCon += '<option value="'+sVal.id+'">'+sVal.title+'</option>';
                            }); 
                        }
                        fCon += "</select>";
                    }
                    
                    if(value["type"] === "select") {
                        fCon += '<select name="'+newName+'" id="'+index+'" class="form-control">';
                        fCon += '<option value="">--Select '+value["label"]+'--</option>';
                        if(index === "active_status") {
                            var statusA = ["active","suspended","Applicant"];
                            for(var i=0;i<statusA.length;i++) {
                                fCon += '<option value="'+statusA[i]+'">'+statusA[i]+'</option>';
                            }
                        }else if(index === "state" && (typeof data.state !== "undefined" || typeof data.states !== "undefined")) {
                            var state = (typeof data.states !== "undefined") ? data.states : data.state;
                            $.each(state,function(sIn,sVal) {
                                fCon += '<option value="'+sVal.state_code+'">'+sVal.state_name+'</option>';
                            });
                        }else if((index === "region" || index === "region_id") && typeof data.regions !== "undefined") {
                            $.each(data.regions,function(sIn,sVal) {
                                fCon += '<option value="'+sVal.id+'">'+sVal.title+'</option>';
                            });
                        }else if(index === "country" && typeof data.countries !== "undefined") {
                            $.each(data.countries,function(sIn,sVal) {
                                fCon += '<option value="'+sVal.country_name+'">'+sVal.country_name+'</option>';
                            });
                        }else if(index === "menu") {
                            if(typeof data.menu !== "undefined") {
                                $.each(data.menu,function(i,m) {
                                    fCon += "<option value='"+i+"'>"+i+"</option>";
                                    $.each(m,function(im,mm) {
                                        fCon += "<option value='"+mm+"' disabled>---"+mm+"</option>";
                                    });
                                });
                            }
                        }else {
                            if(typeof value["value_from"] !== "undefined") {
                                $.each(value["value_from"],function(i,v){
                                    fCon +='<option value="'+i+'">'+v+'</options>';
                                });
                            }
                        }
                        fCon += '</select>';
                    }
                    
                fCon += '</div>';
            }
        });
        fCon += '</div>';
        fCon += '<div class="box-footer"><span class="btn btn-primary" onclick="Util._handelFormSubmit(\''+extraData.formId+'\',\'POST\')">Submit</span></div>';
        fCon += '</form></div></div></div>';
        $("#"+extraData.appendDivId).html(fCon);
        if(editorIn.length > 0 ) {
            for(var i=0;i < editorIn.length;i++) {
                CKEDITOR.replace( editorIn[i] );
            }
        }
        if(typeof extraData.autocomplete !== "undefined") {
            Util._registerAutoComplete(extraData.autocomplete);
        }
        
    },
    _editFunctionProcess : function(data,extraData) {
        var editorIn = [];
        var encType = (typeof extraData.fileUpload !== "undefined") ? " enctype = 'multipart/form-data'" : "";
        var fCon = '<div class="row"><div class="col-md-12"><div class="box box-info"><form role="form" action="'+extraData.formUrl+'" id="'+extraData.formId+'"'+encType+' method="POST"><div class="box-body">';
        $.each(extraData,function(index,value) {
            if(typeof value["associated"] !== "undefined") {
                data[value["associated"]][index] = (data[value["associated"]][index] != null) ? data[value["associated"]][index] : ""; 
            }else {
                data[index] = (data[index] != null) ? data[index] : ""; 
            }
            if(typeof value["type"] !== "undefined") {
                var newName = extraData.fieldWrapper+'['+index+']';
                fCon += '<div class="form-group">';
                    if(value["type"] !== "hidden") {
                        fCon += '<label for="'+index+'">'+value["label"]+'</label>';
                    }
                    if(value["type"] === "text") {
                        if(typeof value["take_value"] !== "undefined") {
                            var main_key = value["take_value"]["main_key"];
                            if(typeof data[main_key] !== "undefined") {
                                if(value["take_value"]["field"].indexOf("|") === -1) {
                                    var fieldN = value["take_value"]["field"];
                                    var val = data[main_key][fieldN];
                                }else {
                                    var fieldN = value["take_value"]["field"].split("|");
                                    var valU = "";
                                    for(var i=0;i<fieldN.length;i++) {
                                        var lab = fieldN[i];
                                        if(typeof data[main_key][lab] !== "undefined") {
                                           valU +=  data[main_key][lab]+" ";
                                        }
                                    }
                                    var val = valU.trim();
                                }
                            }else {
                                var val = "";
                            }
                        }else if(typeof value["associated"] !== "undefined") {
                            var val = data[value["associated"]][index];
                        }else {
                            var val = data[index];
                        }
                        fCon += '<input id="'+index+'" class="form-control" type="'+value["type"]+'" placeholder="Enter '+value["label"]+'" name="'+newName+'" value="'+val+'">';
                    }
                    if(value["type"] === "file") {
                        fCon += '<input id="'+index+'"  type="'+value["type"]+'" name="'+newName+'" value="">';
                    }
                    if(value["type"] === "password") {
                        fCon += '<input id="'+index+'" class="form-control" type="'+value["type"]+'" placeholder="Enter '+value["label"]+'" name="'+newName+'" value="'+data[index]+'">';
                    }
                    if(value["type"] === "hidden") {
                        var val = (typeof value["value_from"] !== "undefined") ? value["value_from"] : data[index];
                        fCon += '<input id="'+index+'" class="form-control" type="'+value["type"]+'" placeholder="Enter '+value["label"]+'" name="'+newName+'" value="'+val+'">';
                    }
                    if(value["type"] === "textarea") {
                        var val = (typeof value["associated"] !== "undefined") ? data[value["associated"]][index] : data[index];
                        fCon += '<textarea class="form-control" placeholder="Enter '+value["label"]+'" rows="3" id="'+index+'" name="'+newName+'">'+val+'</textarea>';
                        editorIn.push(index);
                    }
                    
                    if(value["type"] === "multiple") {
                        fCon += '<select name="'+newName+'[]" id="'+index+'" class="form-control" multiple="multiple">';
                        if(index === "regions_of_interest") {
                            var arRegion = [];
                            if(typeof data["volunteer_regions"] !== "undefined"){
                                arRegion = Util._inArrayHandling(data["volunteer_regions"],'region_id');
                            }
                            
                            $.each(data.regions,function(sIn,sVal) {
                                var selec = ($.inArray(sVal.id,arRegion) !== -1) ? ' selected="selected"' : "";
                               
                                fCon += '<option value="'+sVal.id+'"'+selec+'>'+sVal.title+'</option>';
                            });
                        }
                        
                        if(index === "skills") {
                            var arSkill = [];
                            if(typeof data["volunteer_skills"] !== "undefined"){
                                arSkill = Util._inArrayHandling(data["volunteer_skills"],'skill_id');
                            }
                            $.each(data.skills,function(sIn,sVal) {
                                var sel = ($.inArray(sVal.id,arSkill) !== -1) ? ' selected="selected"' : "";
                                 fCon += '<option value="'+sVal.id+'"'+sel+'>'+sVal.title+'</option>';
                             }); 
                        }
                        fCon += "</select>";
                    }
                    
                    if(value["type"] === "select") {
                        fCon += '<select name="'+newName+'" id="'+index+'" class="form-control">';
                        fCon += '<option value="">--Select '+value["label"]+'--</option>';
                        if(index === "active_status") {
                            var statusA = ["active","suspended","Applicant"];
                            for(var i=0;i<statusA.length;i++) {
                                var selected = (statusA[i] === data[index]) ? ' selected="selected"' : "";
                                fCon += '<option value="'+statusA[i]+'"'+selected+'>'+statusA[i]+'</option>';
                            }
                        }else if(index === "state" && (typeof data.state !== "undefined" || typeof data.states !== "undefined")) {
                            var state = (typeof data.states !== "undefined") ? data.states : data.state;
                            $.each(state,function(sIn,sVal) {
                                var selected = (sVal.state_code === data[index]) ? ' selected="selected"' : "";
                                fCon += '<option value="'+sVal.state_code+'"'+selected+'>'+sVal.state_name+'</option>';
                            });
                        }else if((index === "region" || index === "region_id") && typeof data.regions !== "undefined") {
                            $.each(data.regions,function(sIn,sVal) {
                                var val = (typeof value["associated"] !== "undefined") ? data[value["associated"]][index] : data[index];
                                var selected = (sVal.id == val) ? ' selected="selected"' : "";
                                fCon += '<option value="'+sVal.id+'"'+selected+'>'+sVal.title+'</option>';
                            });
                        }else if(index === "country" && typeof data.countries !== "undefined") {
                            $.each(data.countries,function(sIn,sVal) {
                                var selected = (sVal.country_name === data[index]) ? ' selected="selected"' : "";
                                fCon += '<option value="'+sVal.country_name+'"'+selected+'>'+sVal.country_name+'</option>';
                            });
                        }else if(index === "menu") {
                            if(typeof data.menu !== "undefined") {
                                $.each(data.menu,function(i,m) {
                                    var selected = (data[value["associated"]][index] === i) ? ' selected="selected"' : "";
                                    fCon += "<option value='"+i+"'"+selected+">"+i+"</option>";
                                    $.each(m,function(im,mm) {
                                        fCon += "<option value='"+mm+"' disabled>---"+mm+"</option>";
                                    });
                                });
                            }
                        }else {
                            if(typeof value["value_from"] !== "undefined") {
                                $.each(value["value_from"],function(i,v) {
                                    var fieldName = (typeof value["associated"] !== "undefined") ? data[value["associated"]][index] : data[index];
                                    var selected = (i == fieldName) ? ' selected="selected"' : "";
                                    fCon += '<option value="'+i+'"'+selected+'>'+v+'</option>';
                                });
                            }
                        }
                        fCon += '</select>';
                    }
                    
                fCon += '</div>';
            }
        });
        fCon += '</div>';
        fCon += '<div class="box-footer"><span class="btn btn-primary" onclick="Util._handelFormSubmit(\''+extraData.formId+'\',\'PUT\')">Submit</span></div>';
        fCon += '</form></div></div></div>';
        $("#"+extraData.appendDivId).html(fCon);
        if(editorIn.length > 0 ) {
            for(var i=0;i < editorIn.length;i++) {
                CKEDITOR.replace( editorIn[i] );
            }
        }
        if(typeof extraData.autocomplete !== "undefined") {
            Util._registerAutoComplete(extraData.autocomplete);
        }
        
        if(typeof extraData.date_picker !== "undefined") {
            Util._registerDatePicker(extraData.date_picker)
        }
        
    },
    _inArrayHandling : function(ar,key){
        var sel = [];
        $.each(ar,function(i,v) {
            sel.push(v[key]);
        });
        return sel;
    },
    _handelFormSubmit : function(formName,methodS) {
        for ( instance in CKEDITOR.instances ) {
            CKEDITOR.instances[instance].updateElement();
        }
        var urlS = $(".content-wrapper #"+formName).attr('action');
        var faction = (typeof urlS === "undefined") ? $(".content-wrapper form").attr('action') : urlS
        var data = new FormData($(".content-wrapper form")[0]);
        //var data = $("#"+formName).serialize();
        Util._ajax(faction,methodS,"json",data,{"formName":formName},Util._afterFormSubmit);
        return false;
    },
    _afterFormSubmit : function(data,extraData) {
        if(typeof data.errors !== "undefined") {
            var errors = "<div class='alert alert-danger' id='errorSummary'><p>Please fix following error:</p><ul>";
            $.each(data.errors,function(index,value) {
                errors += '<li>'+value+'</li>';
            }); 
            errors += '</ul></div>';
            $(".content #errorSummary").remove();
            $("#"+extraData.formName).before(errors);
            Util._scrollTo(extraData.formName);
        }
        
        if(typeof data.successMessage !== "undefined") {
            $(".content #successSummary").remove();
            var success = "<div class='alert alert-success' id='successSummary'>"+data.successMessage+"</div>";
            $("#"+extraData.formName).before(success);
            Util._scrollTo(extraData.formName);
        }
    },
    _scrollTo : function(cID) {
        $('html,body').animate({
            scrollTop: $(".content").offset().top},
        'slow');
    },
    _deleteData : function(url,method,id,at_place,obj) {
        if(confirm("Are you sure to delete this record?")) {
            obj = $(obj).parent().parent().parent();
            Util._ajax(url,method,"json",{},{"obj" : obj,"at_place" : at_place},Util._deleteHandler);
        }
    },
    _deleteHandler : function(data,extraData) {
        if(typeof data.successMessage !== "undefined") {
            extraData.obj.find("td:nth-child("+extraData.at_place+")").html('Suspended');
            alert(data.successMessage);
        }else {
            alert("error in delete");
        }
    },
    _registerAutoComplete : function(data) {
        $.each(data,function(i,value) {
            $("#"+value.divID).find("#"+value.inputID).autocomplete({
                "source": function(request, response){
                    var url = value.ajaxUrl;
                    url += "?term="+$("#"+value.divID).find("#"+value.inputID).val();
                    Util._ajax(url,'GET',"json","","",function(data) {
                        response(data);
                    });
                    //setTimeout(function() {console.log(data)},2000);
                },
                minLength: 3,
               select: function( event, ui ) {
                   $("#"+value.divID).find("#"+value.value_divID).val(ui.item.id);
               }
            });
        })
        
    },
    _registerDatePicker : function(data) {
        $.each(data, function(i,value) {
            $("#"+value.divID).find("#"+value.inputID).datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true
            });
        });
    },
    _applicationStatus : function(status) {
        
        if(status === 1) {
            return "Trip";
        }else if(status === 0) {
            return "Under Review / Pending";
        }else if(status === 4) {
            return "Approved By Partner";
        }else if(status === 3) {
            return "Cancelled";
        }else if(status === 2){
            return "Declined By Partner";
        }else {
            return "Sonu";
        }
    },
    _handelVolunteerApplicationAjaxResponse : function(data,extraData) {
        var fieldAr = {
            "first_name" : {"label":"Volunteer","sort":"yes","association":"volunteers"},
            "organization_name" : {"label":"Partner","sort":"yes","association": "partners"},
            "start_date" : {"label": "Start Date","sort":"yes"},
            "end_date" : {"label":"End Date","sort":"yes"},
            "status" : {"label": "Status","sort":"no"},
            "datecreated" : {"label":"Date Added","sort":"yes"},
            "action" : {"label" : "Action","sort":"no"}
        };
        var content = "";
        var headerCon = Util._processHeader(fieldAr,"volunteerApplicationForm","volunteer_application",data.sort,data.sort_by,'Util._handelVolunteerApplicationAjaxResponse');
        content += headerCon;
        $.each(data.applications,function(i,value){
            content += "<tr>";
            var volunteer = (typeof value.volunteer !== "undefined")? [value.volunteer.first_name,value.volunteer.last_name].join(' ') : "";
            content += '<td>'+volunteer+'</td>';
            var partner = (typeof value.partner !== "undefined")? value.partner.organization_name : "";
            content += '<td>'+partner+'</td>';
            content += '<td>'+Util._formatDate(value.start_date)+'</td>';
            content += '<td>'+Util._formatDate(value.end_date)+'</td>';
            content += '<td>'+Util._applicationStatus(value.status)+'</td>';
            content += '<td>'+Util._formatDate(value.datecreated)+'</td>';
            
            content += '<td><a href="/admin/volunteerapplication/edit/'+value.id+'"><i class="fa fa-edit"></i></a></td>';
            content += "</tr>";
        });
        var paging = Util._createPagination(data.current_page,data.total_page,'volunteer_application','volunteerApplicationForm','Util._handelVolunteerApplicationAjaxResponse');
        content += '<tr><td colspan="7">'+paging+'</td></tr>';
        $("#volunteerApplicationLisiting").find("table").html(content);
    },
    _pageListing : function(data,extraData) {
        var fieldAr = {
          "title_doc" : {"label":"Title","sort":"yes","association":"pages"},
          "title_link" : {"label":"Page Url","sort":"yes"},
          "pages.id" : {"label":"Id","sort":"yes"},
          "pages.version" : {"label":"Status","sort":"yes"},
          "action" : {"label":"Action","sort":"no"}
        };
        var content = "";
        var headerCon = Util._processHeader(fieldAr,"pageListingForm","pages",data.sort,data.sort_by,'Util._pageListing');
        content += headerCon;
        $.each(data.pages,function(i,value) {
            content += '<tr>';
            var title_doc = (typeof value.page !== "undefined") ? value.page.title_doc : "";
            content += '<td>'+title_doc+'</td>';
            content += '<td>'+value.title_link+'</td>';
            var id = (typeof value.page !== "undefined") ? value.page.id : "";
            content += '<td>'+id+'</td>';
            var versions = (typeof value.page !== "undefined" && value.page.version != null) ? value.page.version : "";
            content += '<td>'+versions+'</td>';
            
            content += '<td><a href="/admin/page/edit/'+value.id+'"><i class="fa fa-edit"></i><a></td>';
            content += '</tr>';
        });
        var paging = Util._createPagination(data.current_page,data.total_page,'pages','pageListingForm','Util._pageListing');
        content += '<tr><td colspan="5">'+paging+'</td></tr>';
        $("#pageLisiting table").html(content);
    },
    _dropDownFilter : function(value,fieldName,formName,url,method) {
        $("#"+formName).find("#"+fieldName).val(value);
        Util._ajax(url,"GET","json",$("#"+formName).serialize(),"",method);
    },
    _removeData : function(divID,module,id,url) {
        var ids = "#"+module+"_"+id;
        var obj = $("#"+divID).find(ids);
        var newUrl = (url.indexOf("/") != -1) ? url : url+"/"+id;
        if(confirm("Are you sure to delete?")) {
            Util._ajax(newUrl,"DELETE","json","","",function(data) {
                if(typeof data.status !== "undefined") {
                    obj.remove();
                }else {
                    alert("Please try after some time!");
                }
            });
        }
    }
};

var LandingPage = {
    _handle : function(data,extraData) {
        var fieldAr = {
            "volunteer_opportunities_landing_pages.title_heading" : {"label":"Page Title","sort":"yes"},
            "pages_index.title_link" : {"label":"Page Url","sort":"yes"},
            "region.title" : {"label":"Region","sort":"yes"},
            "volunteer_opportunities_landing_pages.version" : {"label":"Page Status","sort":"yes"},
            "action" : {"label":"Action","sort":"no"}
        };
        var content = "";
        var headerCon = Util._processHeader(fieldAr,"landingPageListingForm","landing_pages",data.sort,data.sort_by,'LandingPage._handle');
        content += headerCon;
        $.each(data.pages,function(i,value) {
            var heading = (typeof value.page_detail !== "undefined") ? value.page_detail.title_heading: "";
            content += "<tr>";
            content += "<td>"+heading+"</td>";
            content += "<td>"+value.title_link+"</td>";
            var heading = (typeof value.region !== "undefined") ? value.region.title: "";
            content += '<td>'+heading+'</td>';
            var heading = (typeof value.page_detail !== "undefined") ? value.page_detail.version: "";
            content += '<td>'+heading+'</td>';
            content += '<td><a href="/admin/landingpage/edit/'+value.id+'"><i class="fa fa-edit"></i></a></td>';
            content += "</tr>";
        });
        
        $("#landingPageLisiting table").html(content);
    }
};

var DonationForm = {
    _handle : function(data,extraData) {
        var fieldAr = {
            "partners.organization_name" : {"label":"Partner","sort":"yes"},
            "title" : {"label" : "Title","sort":"yes"},
            "slug" : {"label":"Url","sort":"yes"},
            "campaign" : {"label":"Amount","sort":"yes"},
            "donation_forms.date_added" : {"label":"Adeed Date","sort":"yes"},
            "action" : {"label":"Action","sort":"no"}
        };
        var content = "";
        var headerCon = Util._processHeader(fieldAr,"donationListingForm","donation_forms",data.sort,data.sort_by,'DonationForm._handle');
        content += headerCon;
        
        $.each(data.forms,function(i,value) {
            content += '<tr id="donation_'+value.id+'">';
            var partner = (typeof value.partner !== "undefined") ? value.partner.organization_name : "";
            content += "<td>"+partner+"</td>";
            content += "<td>"+value.title+"</td>";
            content += "<td>"+value.slug+"</td>";
            content += "<td>"+value.campaign+"</td>";
            content += "<td>"+Util._formatDate(value.date_added)+"</td>";
            content += "<td><a href='/admin/donationform/edit/"+value.id+"'><i class='fa fa-edit'></i></a></td>";
            content += "</tr>";
        });
        var paging = Util._createPagination(data.current_page,data.total_page,'donation_forms','donationListingForm','DonationForm._handle');
        content += '<tr><td colspan="5">'+paging+'</td></tr>';
        $("#donationLisiting table").html(content);
    }
};

var EdgePageSlide = {
	_handle : function(data,extraData) {
		var fieldAr = {
			"sequence" : {"label":"Swquesnce","sort":"yes"},
			"status" : {"label":"Status","sort":"yes"},
			"action" : {"label":"Action","sort":"no"}
		};
		var content = "";
		var headerCon = Util._processHeader(fieldAr,"edgeSlideListingForm","edge_page_slides",data.sort,data.sort_by,'EdgePageSlide._handle');
        content += headerCon;
        $.each(data.slides,function(i,value) {
        	content += "<tr id='slide_"+value.id+"'>";
        	content += "<td>"+value.sequence+"</td>";
        	var status = (value.status === true) ? "Active" : "Deactive";
        	content += "<td>"+status+"</td>";
        	content += "<td><div class='tools'><a href='/admin/edgepageslide/edit/"+value.id+"'><li class='fa fa-edit'></li></a><a href='javascript:void(0)' onclick='Util._deleteData(\"edge_page_slides/"+value.id+"\",\"DELETE\",\"slide_"+value.id+"\",\"2\",this)'><i class='fa fa-trash-o'></i></a></div></td>";
        	content += "</tr>";
        });
        
        $("#edgeSlideLisiting table").html(content);		
	}
};

var HomePageSlide = {
	_handle : function(data,extraData) {
		var fieldAr = {
			"title" : {"label": "Title","sort":"yes"},
			"sequence" : {"label":"Sequence","sort": "yes"},
			"slide_ulr" : {"label":"Slide Url","sort":"yes"},
                        "filename" : {"label": "Slide Image","sort":"no"},
			"action" : {"label" : "Action","sort":"no"}
		};
		var content = "";
		var heading = Util._processHeader(fieldAr,"homeSlideFom","home_page_slides",data.sort,data.sort_by,"HomePageSlide._handle");
		content += heading;
		$.each(data.slides,function(i,value) {
			content += "<tr>";
			content += "<td>"+value.title+"</td>";
			content += "<td>"+value.sequence+"</td>";
			content += "<td>"+value.slide_ulr+"</td>";
                        var image = (value.s3_iamge_url !== "no") ? '<img src="'+value.s3_iamge_url+'" />' : "";
                        content += "<td>"+image+"</td>";
			content += "<td><a href='/admin/homepageslide/edit/"+value.id+"'><i class='fa fa-edit'></i></a></td>";
			content += "</tr>";
		});
		var paging = Util._createPagination(data.current_page,data.total_page,'home_page_slides','homeSlideFom','HomePageSlide._handle');
        content += '<tr><td colspan="5">'+paging+'</td></tr>';
		$("#homeSlide table").html(content);
	}
};

var Donation = {
    _handle : function(data,extraData) {
        var fieldAr = {
            "first_name" : {"label":"First Name","sort":"yes"},
            "last_name" : {"label":"Last Name","sort":"yes"},
            "partners.organization_name" : {"label":"Partner","sort":"yes"},
            "partner_donations.date_added" : {"label":"Donation Date","sort":"yes"},
            "amount" : {"label":"Amount","sort":"yes"},
            "paypal_fee" : {"label":"Paypal Fee","sort":"yes"},
            "omp_fee" : {"label":"Omp Fee","sort":"yes"},
            "Transaction_no" : {"label":"Transaction No","sort":"yes"},
            "paypal_id" : {"label":"Paypal Id","sort":"yes"},
            "action" : {"label" : "Action","sort":"no"}
            
        };
        
        var content = "";
        var heading = Util._processHeader(fieldAr,"donationListingForm","donations",data.sort,data.sort_by,"Donation._handle");
        content += heading;
        $.each(data.donations,function(i,value) {
            content += "<tr id='donation_"+value.id+"'>";
            content += "<td>"+value.first_name+"</td>";
            content += "<td>"+value.last_name+"</td>";
            var partner = (typeof value.partner !== "undefined") ? value.partner.organization_name : "";
            content += "<td>"+partner+"</td>";
            content += "<td>"+Util._formatDate(value.date_added)+"</td>";
            content += "<td>"+value.amount+"</td>";
            content += "<td>"+value.paypal_fee+"</td>";
            content += "<td>"+value.omp_fee+"</td>";
            content += "<td>"+value.Transaction_no+"</td>";
            content += "<td>"+value.paypal_id+"</td>";
            content += "<td><a href='/admin/donation/edit/"+value.id+"'><i class='fa fa-edit'></i></a></td>";
            content += "</tr>";
        });
        var paging = Util._createPagination(data.current_page,data.total_page,'donations','donationListingForm','Donation._handle');
        content += '<tr><td colspan="10">'+paging+'</td></tr>';
        $("#donationListing table").html(content);
    },
    _summary : function(data,extraData) {
        var fieldAr = {
            "partners.organization_name" : {"label" : "Partner","sort" : "yes"},
            "sum_amount" : {"label" : "Total Earmarked Donations","sort" : "yes"},
            "sum_paypal_fee" : {"label" : "Total Paypal Fees","sort" : "yes"},
            "sum_omp_fee" : {"label" : "Total Omprakash Fees","sort" : "yes"},
            "net_donation" : {"label" : "Total Net Donations","sort" : "yes"},
            "sum_debit" : {"label" : "Total Past Transfers","sort" : "no"},
            "balance" : {"label" : "Current_Balance","sort" : "no"}
         };
         $("#totalEarn .box-body").html("<strong>$"+data.amount_sum+"</strong>");
         $("#totalPaypalFee .box-body").html("<strong>$"+data.paypal_sum+"</strong>");
         $("#totalOmpFee .box-body").html("<strong>$"+data.omp_fee_sum+"</strong>");
         $("#pastRans .box-body").html("<strong>$"+data.transfer_sum+"</strong>");
         $("#allBalance .box-body").html("<strong>$"+data.transfer_sum+"</strong>");
         
         var content = "";
        var heading = Util._processHeader(fieldAr,"summaryForm","donations/financial_summary",data.sort,data.sort_by,"Donation._summary");
        content += heading;
        
        $.each(data.finance,function(i,value) {
            content += "<tr>";
            content += "<td>"+value.partner+"</td>";
            content += "<td>"+value.amount+"</td>";
            content += "<td>"+value.paypal_fee+"</td>";
            content += "<td>"+value.omp_fee+"</td>";
            content += "<td>"+value.net_donation+"</td>";
            var debit = (typeof data["debit"][value.partner_id] !== "undefined") ? data["debit"][value.partner_id]["sum_debit"] : "0.00";
            content += "<td>"+debit+"</td>";
            content += "<td>"+parseFloat(value.amount - value.paypal_fee - value.omp_fee - debit)+"</td>";
            content += "</tr>";
        });
        
        $("#financialSummary table").html(content);
    }
};

var Transfer = {
    _handle : function(data,extraData) {
        var fieldAr = {
            "partners.organization_name": {"label":"Partner","sort":"yes"},
            "debit" : {"label": "Transfer Amount","sort":"yes"},
            "payments_made.date_added" : {"label":"Transfer Date","sort":"yes"},
            "action" : {"label": "Action","sort":"no"}
        };
        
        var content = "";
        var heading = Util._processHeader(fieldAr,"transferListingForm","transfers",data.sort,data.sort_by,"Transfer._handle");
        content += heading;
        $.each(data.transfers,function(i,value) {
            content += "<tr id='transfer_"+value.id+"'>";
            var partner = (typeof value.partner !== "undefined") ? value.partner.organization_name : "";
            content += '<td>'+partner+'</td>';
            content += '<td>'+value.debit+'</td>';
            content += '<td>'+Util._formatDate(value.created_at)+'</td>';
            content += '<td><a href="/admin/transfer/edit/'+value.id+'"><i class="fa fa-edit"></i></a><a href="javascript:void(0)"><i class="fa fa-trash-o" onclick="Util._removeData(\'transferListing\',\'transfer\','+value.id+',\'transfers\')"></i></a></td>';
            content += "</tr>";
        });
        var paging = Util._createPagination(data.current_page,data.total_page,'transfers','transferListingForm','Transfer._handle');
        content += '<tr><td colspan="4">'+paging+'</td></tr>';
        $("#transferListing table").html(content);
    }
};

var Receipts = {
    _handle : function(data,extraData) {
        var fieldAr = {
            "partners.organization_name" : {"label" : "Partner","sort" : "yes"},
            "title" : {"label" : "Title","sort": "yes"},
            "category" : {"label":"Category","sort":"yes"},
            "amount" : {"label" : "Amount","sort" : "yes"},
            "date_added" : {"label" : "Receipt Date","sort" : "yes"},
            "action" : {"label" : "Action", "sort" : "no"}
        };
        
        var content = "";
        var heading = Util._processHeader(fieldAr,"receiptForm","receipts",data.sort,data.sort_by,"Receipts._handle");
        content += heading;
        $.each(data.receipts, function(i,value) {
            content += "<tr id='receipt_"+value.id+"'>";
            var partner = (typeof value.partner !== "undefined") ? value.partner.organization_name : "";
            content += "<td>"+partner+"</td>";
            content += "<td>"+value.title+"</td>";
            content += "<td>"+value.category+"</td>";
            content += "<td>"+value.amount+"</td>";
            content += "<td>"+Util._formatDate(value.date_added)+"</td>";
            content += "<td><a href='/admin/receipt/edit/"+value.id+"'><i class='fa fa-edit'></i></a><a href='javascript:void(0)' onclick='Util._removeData(\"expenseReceipt\",\"receipt\","+value.id+",\"receipts\")'><i class='fa fa-trash-o'></i></a></td>";
            content += "</tr>";
        });
        var paging = Util._createPagination(data.current_page,data.total_page,'receipts','receiptForm','Receipts._handle');
        content += '<tr><td colspan="6">'+paging+'</td></tr>';
        $("#expenseReceipt table").html(content);
    }
};

var PartnerStory = {
    _handle : function(data,extraData) {
        var fieldAr = {
            "partners.organization_name": {"label":"Partner","sort" : "yes"},
            "title" : {"label" : "Title","sort": "yes"},
            "stub" : {"label": "Story Url","sort":"yes"},
            "date_added" : {"label" : "Story Date", "sort" : "yes"},
            "action" : {"label" : "Action","sort" : "no"}
        };
        
        var content = "";
        var heading = Util._processHeader(fieldAr,"storyForm","stories/partners",data.sort,data.sort_by,"PartnerStory._handle");
        content += heading;
        
        $.each(data.stories,function(i,value) {
            content += "<tr id='story_"+value.id+"'>";
            content += "<td>"+value.organization_name+"</td>";
            content += "<td>"+value.title+"</td>";
            content += "<td>"+value.stub+"</td>";
            content += "<td>"+Util._formatDate(value.date_added)+"</td>";
            var edit = (value.blog_type === "old") ? "<a href='/admin/story/edit/"+value.id+"'><i class='fa fa-edit'></i></a>" : "";
            content += "<td>"+edit+"<a href='javascript:void(0)' onclick='Util._removeData(\"partnerStories\",\"story\","+value.id+",\"stories/"+value.id+"/partner_story_delete\")'><i class='fa fa-trash-o'></i></a></td>";
            content += "</tr>";
        });
        
        var paging = Util._createPagination(data.current_page,data.total_page,'stories/partners','storyForm','PartnerStory._handle');
        content += '<tr><td colspan="5">'+paging+'</td></tr>';
        $("#partnerStories table").html(content);
    }
};

var Team = {
    _handle : function(data,extraData) {
        var fieldAr = {
            "name" : {"label" : "Name","sort":"yes"},
            "role" : {"label" : "Role","sort":"yes"},
            "email" : {"label" : "Email","sort" : "yes"},
            "skype" : {"label" : "Skype", "sort" : "yes"},
            "action" : {"label" : "Action", "sort" : "no"}
        };
        
        var content = "";
        var heading = Util._processHeader(fieldAr,"teamForm","team",data.sort,data.sort_by,"Team._handle");
        content += heading;
        
        $.each(data.teams,function(i,value){
            content += "<tr id='team_"+value.id+"'>";
            content += "<td>"+value.name+"</td>";
            content += "<td>"+value.role+"</td>";
            content += "<td>"+value.email+"</td>";
            content += "<td>"+value.skype+"</td>";
            content += "<td><a href='/admin/team/edit/"+value.id+"'><i class='fa fa-edit'></i></a><a href='javascript:void(0)' onclick='Util._removeData(\"team\",\"team\","+value.id+",\"team\")'><i class='fa fa-trash-o'></i></a></td>";
            content += "</tr>";
        });
        
        $("#team table").html(content);
    }
};

var Board = {
    _handle : function(data,extraData) {
        var fieldAr = {
            "name" : {"label" : "Name","sort":"yes"},
            "role" : {"label" : "Role","sort":"yes"},
            "email" : {"label" : "Email","sort" : "yes"},
            "skype" : {"label" : "Skype", "sort" : "yes"},
            "action" : {"label" : "Action", "sort" : "no"}
        };
        
        var content = "";
        var heading = Util._processHeader(fieldAr,"teamForm","board",data.sort,data.sort_by,"Board._handle");
        content += heading;
        
        $.each(data.boards,function(i,value){
            content += "<tr id='team_"+value.id+"'>";
            content += "<td>"+value.name+"</td>";
            content += "<td>"+value.role+"</td>";
            content += "<td>"+value.email+"</td>";
            content += "<td>"+value.skype+"</td>";
            content += "<td><a href='/admin/board/edit/"+value.id+"'><i class='fa fa-edit'></i></a><a href='javascript:void(0)' onclick='Util._removeData(\"team\",\"team\","+value.id+",\"board\")'><i class='fa fa-trash-o'></i></a></td>";
            content += "</tr>";
        });
        
        $("#team table").html(content);
    }
};


