/// Initializations

var pid, activeImage, allowActions = 1, flash = 0, attempts = 10, allowProcessing = 0, params = [], spinners = [],
    sessionID = randomString(), fileID, uploadCarousel, maxQueue = 20, uploader, zoomers = [], sliders = [], syncing = 0,
    clearingSample = 0, resizeTimeout, winWidth, visibleFiles = 5, convertQueue = [], converting = 0,
    origin = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port : '');

$(document).ready(function() {
    updateSize();
    $(window).bind("resize", updateSize);
    $(window).bind("orientationchange", updateSize);

    $("#pick-files").button({"icons" : { "primary" : "ui-icon-folder-open" }});
    $("#reset-all").button({"icons" : { "primary" : "ui-icon-close" }});
    $("#carousel-prev").button({"icons" : { "primary" : "ui-icon-triangle-1-w" }, "text" : false});
    $("#carousel-next").button({"icons" : { "primary" : "ui-icon-triangle-1-e" }, "text" : false});
    $("#download-all").button({ "icons" : { "primary" : "ui-icon-check" } }).click(function(e) {
        var order = [];
        $("#filelist li.plupload_done").each(function() {
            order.push(this.id);
        });
        downloadURI("all/" + sessionID + "/" + zipName + "?order=" + order.join(",") + "&rnd=" + Math.random(), zipName);
        this.blur();
        $(this).trigger("mouseout");
        e.preventDefault();
    }).button("disable");

    initUploader();

    $("#reset-all").click(function(e) {
        this.blur();
        $(this).trigger("mouseout");
        clearPreview(1);
        for (var i = 0; i < uploader.files.length; i++) {
            uploadCarousel.xCarousel("removeItem", "#" + uploader.files[i].id);
        }
        resetUploader();
        e.preventDefault();
    });

    updateButtons();

    $.fx.speeds._default = 100;
});

function initUploader() {
    var settings = {
        "runtimes" : "html5,flash",
        "browse_button" : "pick-files",
        "container" : "upload-buttons-wrapper",
        "max_file_size" : sizeLimit,
        "url" : origin + "/upload/" + sessionID,
        "flash_swf_url" : origin + "/common/js/plupload2/Moxie.swf",
        "filters" : [{"title" : text["js_images"], "extensions" : fileTypeExts}],
        "multipart" : true,
        "dragdrop" : true,
        "drop_element" : "container"
    };
    uploader = new plupload.Uploader(settings);

    uploader.bind('Init', function(up, params) {
        if (params.runtime == 'html5') $("#carousel").append('<div id="plupload_drop">' + text["js_dropfiles"] + '</div>');

        up.bind("BeforeUpload", function (up, file) {
            if (up.settings.multipart_params) $.extend(up.settings.multipart_params, {"id" : file.id});
            else up.settings.multipart_params = {"id" : file.id};
        });

        up.bind("FilesAdded", function(up, files) {
            var delCounter = 0;
            while (up.files.length > maxQueue) {
                up.removeFile(up.files[maxQueue]);
                delCounter++;
            }
            $("#plupload_drop").hide("fade");
            var addCounter = files.length - delCounter;;
            if (typeof(uploadCarousel) == "object") {
                $.each(files, function(i, file) {
                    if (addCounter <= 0 || file.status != 1) return;
                    uploadCarousel.xCarousel("addItem", fileBlock(file));
                    addCounter--;
                    fileStatus(file.id, "uploading");
                });
            } else {
                $.each(files, function(i, file) {
                    if (addCounter <= 0 || file.status != 1) return;
                    $("#filelist").append(fileBlock(file));
                    addCounter--;
                    fileStatus(file.id, "uploading");
                });
                uploadCarousel = $("#carousel").xCarousel({
                    "btnPrev" : "#carousel-prev",
                    "btnNext" : "#carousel-next",
                    "visible" : visibleFiles,
                    "updateButtons" : updateButtons
                });
            }
            updateList();
            up.refresh();
            up.start();
        });

        up.bind("UploadProgress", function(up, file) {
            $("#" + file.id + " div.plupload_file_status").html(file.percent + "% " + text["js_of"] + " " + plupload.formatSize(file.size).toUpperCase());
            $("#" + file.id + " div.plupload_file_progress_bar").css("width", file.percent + "%");
            handleStatus(file);
            if (settings.multiple_queues && up.total.uploaded + up.total.failed == up.files.length) {
                $(".plupload_start").addClass("plupload_disabled");
            }
        });

        up.bind("Error", function(up, err) {
            var file = err.file, message;
            if (file) {
                message = err.message;
                if (err.details) message += " (" + err.details + ")";
                if (err.code == plupload.FILE_SIZE_ERROR) x_prettyError(text["js_toobig"] + ": " + file.name);
                if (err.code == plupload.FILE_EXTENSION_ERROR) x_prettyError(text["js_wrongtype"] + ": " + supportedFormats + ".");
                file.hint = message;
                $("#" + file.id).attr("class", "plupload_failed").find("a").css("display", "block").attr("title", message);
            }
            up.refresh();
        });

        up.bind("FileUploaded", function(up, file, response) {
            var res = eval(jQuery.parseJSON(response.response));
            if (res === null) return;
            if (res.image) {
                getAutoCompress(file.id);
            } else {
                up.trigger("Error", { "file" : file, "message" : res.error.message || text["js_error"] });
            }
        });

        up.bind("UploadFile", function(up, file) {
            $("#" + file.id).addClass("plupload_current_file");
            fileStatus(file.id, "uploading");
        });

        up.bind("StateChanged", function() {
            if (up.state === plupload.STARTED) {
                $("li.plupload_delete a").hide("fade");
            } else {
                updateList();
            }
        });

        up.bind("QueueChanged", updateList);
    });

    uploader.init();
}

function initSettings(fid, format) {
    if (! allowActions) return;
    var changePanel = 0;
    if (! $("#" + format + "-preview-image").length) changePanel++;
    $(".plupload_filelist li .plupload_file_wrapper").removeClass("ui-button-inverse");
    $("#" + fid + " .plupload_file_wrapper").addClass("ui-button-inverse");
    clearPreview();
    fileID = fid;
    setTimeout(function() {
        if (! spinners["original"]) initSpinner("original", 1);
        if (! spinners[format]) initSpinner(format, 1);
    }, 0);
    getPanel(format, 1 + changePanel);
}

function setZoom(elem, url, w, h) {
    $(elem).smoothZoom({
        "image_url"                 : url,
        "image_original_width"      : w,
        "image_original_height"     : h,

        "width"                     : "100%",
        "height"                    : "100%",
        "responsive"                : true,
        "responsive_maintain_ratio" : true,

        "pan_BUTTONS_SHOW"          : false,
        "pan_LIMIT_BOUNDARY"        : true,
        "button_SIZE"               : 18,
        "button_ALIGN"              : "bottom right",
        "initial_ZOOM"              : 100,
        "zoom_MIN"                  : 100,
        "zoom_MAX"                  : 400,
        "zoom_BUTTONS_SHOW"         : true,
        "border_SIZE"               : 0,
        "touch_DRAG"                : true,
        "mouse_DRAG"                : true,
        "mouse_WHEEL"               : true,
        "mouse_WHEEL_CURSOR_POS"    : false,
        "mouse_DOUBLE_CLICK"        : false,
        "animation_SMOOTHNESS"      : 0,
        "animation_SPEED_PAN"       : 10,
        "animation_SPEED_ZOOM"      : 10,
        "background_COLOR"          : "transparent",
        "on_ZOOM_PAN_UPDATE"        : function (zd, complete) { if (complete == true) syncImages(elem); },
        "on_ZOOM_PAN_COMPLETE"      : function (zd) { syncImages(elem); }
    });
}

function initPanel(prm) {
    params = prm;
    $("#original-preview-image, #png-preview-image, #jpg-preview-image").mouseenter(function() { activeImage = this.id; });
    $(".param-plus").button({ "icons" : { "primary" : "ui-icon-plusthick" }, "text" : false });
    $(".param-minus").button({ "icons" : { "primary" : "ui-icon-minusthick" }, "text" : false });
    $(".param-minus").button({ "icons" : { "primary" : "ui-icon-minusthick" }, "text" : false });
    $(".apply").button().button("disable");

    sliders = [];
    $(".param-slider div").each(function() {
        var id = this.id;
        if (! params[id]) params[id] = params[id + "_default"];
        $("#" + id + "-num").val(params[id]);
        $("#" + id).slider({
            "orientation" : "vertical",
            "min" : params[id + "_min"],
            "max" : params[id + "_max"],
            "value" : params[id],
            "slide" : function(event, ui) {
                params[this.id] = Math.floor(ui.value);
                $("#" + this.id + "-num").val(params[this.id]);
            },
            "start" : function(event, ui) {
                sliding = 1;
            },
            "stop" : function(event, ui) {
                sliding = 0;
                $("#" + this.id + " a").blur();
                params[this.id] = Math.floor(ui.value);
                $(".params .ui-button").button("enable");
                getPreview();
            },
            "create" : function(event, ui) {
                sliders[this.id] = 1;
            }
        });
        $("#" + id + "-plus").click(function() {
            this.blur;
            $(this).trigger("mouseout");
            if (allowActions == 0) return false;
            var sliderID = this.id.split("-")[0];
            if (params[sliderID] < params[sliderID + "_max"]) {
                params[sliderID]++;
                $("#" + sliderID).slider("option", "value", params[sliderID]);
                $("#" + sliderID + "-num").val(params[sliderID]);
                $(".params .ui-button").button("enable");
                getPreview();
            }
        });
        $("#" + id + "-minus").click(function() {
            this.blur;
            $(this).trigger("mouseout");
            if (allowActions == 0) return false;
            var sliderID = this.id.split("-")[0];
            if (params[sliderID] > params[sliderID + "_min"]) {
                params[sliderID]--;
                $("#" + sliderID).slider("option", "value", params[sliderID]);
                $("#" + sliderID + "-num").val(params[sliderID]);
                $(".params .ui-button").button("enable");
                getPreview();
            }
        });
        
        $("#" + id + "-num").change(function() {
            var nv = Math.floor($(this).val());
            if (nv < params[id + "_min"]) nv = params[id + "_min"];
            if (nv > params[id + "_max"]) nv = params[id + "_max"];
            if (nv !== params[id]) {
                $(this).val(nv);
                params[id] = nv;
                $("#" + id).slider("value", nv);
                $(".params .ui-button").button("enable");
                getPreview();
            }
        }).keypress(function(e) {
            if (e.which == 13) $(this).trigger('change').blur();
        });
    });

    $(".apply").click(function() {
        this.blur();
        $(this).trigger("mouseout");
        if (allowActions == 0) return false;
        getOptimize();
        $(this).button("disable");
    });
}

function initSpinner(format, noshow) {
    var opts = {"lines" : 11, "length" : 4, "width" : 2, "radius" : 6, "corners" : 1, "rotate" : 0, "direction" : 1,
                "color" : "#fff", "speed" : 1, "trail" : 34, "shadow" : true, "hwaccel" : true, "className" : "spinner",
                "zIndex" : 2e9, "top" : "50%", "left" : "50%" };
    if (typeof spinners[format] === "object") {
        spinners[format].spin(document.getElementById(format + "-preview-progress"));
    } else {
        spinners[format] = new Spinner(opts).spin(document.getElementById(format + "-preview-progress"));
        if (noshow) spinners[format].stop();
    }
}

/// Communications

function getAutoCompress(fid) {
    if (! fid) {
        if (converting) return;
        if (! convertQueue.length) {
            if ($(".success").length && !$(".status-uploading, .status-waiting, .status-converting").length) $("#download-all").button("enable");
            else $("#download-all").button("disable");
            return;
        }
        fid = convertQueue.shift();
        if (! fid || ! $("#" + fid + " .status-waiting").length) getAutoCompress();
    } else if (converting) {
        convertQueue.push(fid);
        fileStatus(fid, "waiting");
        return;
    }
    if (! $("#" + fid).length) return;
    converting = fid;
    fileStatus(fid, "converting");
    x_ajax({
        "req" : {
            "url" : "auto/" + sessionID + "/" + fid,
            "type" : "GET",
            "data" : {},
            "dataType" : "json"
        },
        "onData" : function (data) {
            getACStatus(fid);
        },
        "onError" : function () {
            fileStatus(fid, "error");
            converting = 0;
            getAutoCompress();
        },
        "onFail" : function () {
            fileStatus(fid, "error");
            converting = 0;
            getAutoCompress();
        },
        "silent" : 1
    });
}

function getACStatus(fid) {
    allowProcessing = fid;
    x_ajax({
        "req" : {
            "url"       : "status/" + sessionID + "/" + fid,
            "type"      : "GET",
            "dataType"  : "json"
        },
        "onData" : function (data) {
            setTimeout(getAutoCompress, 0);
            $("#" + data.fid + " .plupload_thumb_extra").html(data.savings);
            fileStatus(data.fid, data.thumb_url);
            $("#" + data.fid).addClass("success");
            $("#" + data.fid + " .plupload_thumb").click(function(e) {
                initSettings(data.fid, data.file_format);
                e.preventDefault();
            });
            $("#" + data.fid + " .plupload_thumb_wrapper").mouseenter(function() {
                if ($("#" + data.fid + " .plupload_thumb .status-wrapper").length == 0) {
                    $("#" + data.fid + " .plupload_file_wrapper").addClass("ui-state-active");
                    fileStatus(data.fid, "settings");
                }
            }).mouseleave(function() {
                if ($("#" + data.fid + " .ui-state-active").length > 0) {
                    $("#" + data.fid + " .plupload_file_wrapper").removeClass("ui-state-active");
                    fileStatus(data.fid);
                }
            });
            converting = 0;
            if (! fileID && autoEdit) initSettings(data.fid, data.file_format);
            showProgress(data.fid, data.auto_progress);
            $("#" + fid + " div.plupload_file_button").click(function() {
                downloadURI("download/" + data.sid + "/" + data.fid + "/" + data.result + "?rnd=" + Math.random(), data.result);
            });
        },
        "onProcessing" : function (data) {
            showProgress(data.fid, data.auto_progress);
        },
        "onError" : function () {
            fileStatus(fid, "error");
            converting = 0;
            getAutoCompress();
        },
        "onFail" : function () {
            fileStatus(fid, "error");
            converting = 0;
            getAutoCompress();
        },
        "silent" : 1
    });
}

function getPanel(format, updatePanel) {
    allowProcessing = 1;
    x_ajax({
        "req" : {
            "url" : "panel/" + sessionID + "/" + fileID,
            "type" : "GET",
            "data" : { "colors" : params["colors"], "quality" : params["quality"] },
            "dataType" : "json"
        },

        "onData" : function (data) {
            if ($("#panel").length == 0 || updatePanel == 2) {
                $("#content-note").hide("fade");
                $("#content").html(data.panel).show("fade");
                setTimeout(function() { initPanel(data.image.params); }, 0);
            } else if (updatePanel == 1) {
                params = data.image.params;
                var prop;
                $.each(["colors", "quality"], function(i, prop) {
                    if (! sliders[prop]) return;
                    if (! params[prop]) params[prop] = params[prop + "_default"];
                    $("#" + prop).slider("option", "max", params[prop + "_max"]);
                    $("#" + prop).slider("option", "min", params[prop + "_min"]);
                    $("#" + prop).slider("option", "value", params[prop]);
                    $("#" + prop + "-num").val(params[prop]);
                });
                $(".apply").button("disable");
            }

            loadOriginal(data.image);

            progressOn(data.image.file_format);
            if (! zoomers[data.image.file_format]) {
                zoomers[data.image.file_format] = 1;
                loadImage(data.image.optimized_url, function() {
                    setZoom("#" + data.image.file_format + "-preview-image", data.image.optimized_url, data.image.width, data.image.height);
                    progressOff(data.image.file_format);
                }, 10);
            } else {
                loadImage(data.image.optimized_url + "?" + Math.random(), function() {
                    $("#" + data.image.file_format + "-preview-image img").attr("src", data.image.optimized_url);
                    progressOff(data.image.file_format);
                }, 10);
            }

            $("#" + data.image.file_format + "-preview-info").html(text["js_compressed"] + ": <b>" + data.image.optimized_size_human + "(" + data.image.savings + ")</b> " + data.image.compressed_format_human);
        }
    });
}

function getPreview() {
    allowProcessing = 1;
    x_ajax({
        "req" : {
            "url" : "compress/" + sessionID + "/" + fileID,
            "type" : "GET",
            "data" : { "colors" : params["colors"], "quality" : params["quality"] },
            "dataType" : "json"
        },

        "onData" : function (data) {
            getPStatus(data.file_format);
        }
    });
}

function getPStatus(format) {
    progressOn(format);
    x_ajax({
        "req" : {
            "url"       : "status/" + sessionID + "/" + fileID,
            "type"      : "GET",
            "dataType"  : "json"
        },
        "onData" : function (data) {
            loadImage(data.compressed_url, function() {
                $("#" + data.file_format + "-preview-image img").attr("src", data.compressed_url);                  
                progressOff(data.file_format);
                $("#" + data.file_format + "-preview-info").html(text["js_preview"] + ": <b>&lt; " + data.compressed_size_human + " (" + data.savings + ")</b> " + data.compressed_format_human);
            }, 10);
        },
        "onError" : function () {
            progressOff(format);
            fileStatus(fid, "error");
        },
        "onFail" : function () {
            progressOff(format);
            fileStatus(fid, "error");
        },
        "silent" : 1
    });
}

function getOptimize() {
    allowProcessing = 1;
    $("#" + fileID + " .plupload_thumb_extra").html("");
    fileStatus(fileID, "converting");
    x_ajax({
        "req" : {
            "url" : "optimize/" + sessionID + "/" + fileID,
            "type" : "GET",
            "data" : { "colors" : params["colors"], "quality" : params["quality"] },
            "dataType" : "json"
        },

        "onData" : function (data) {
            getOStatus(data.file_format);
        }
    });
}

function getOStatus(format) {
    progressOn(format);
    x_ajax({
        "req" : {
            "url"       : "status/" + sessionID + "/" + fileID,
            "type"      : "GET",
            "dataType"  : "json"
        },
        "onData" : function (data) {
            loadImage(data.optimized_url, function() {
                $("#" + data.file_format + "-preview-image img").attr("src", data.optimized_url);                   
                progressOff(data.file_format);
                $("#" + data.file_format + "-preview-info").html(text["js_compressed"] + ": <b>" + data.optimized_size_human + " (" + data.savings + ")</b> " + data.compressed_format_human);
                $("#" + data.fid + " .plupload_thumb_extra").html(data.savings);
                fileStatus(data.fid, data.thumb_url);
                $("#download-all").button("enable");
            }, 10);
            showProgress(data.fid, data.optimize_progress);
        },
        "onProcessing" : function (data) {
            showProgress(data.fid, data.optimize_progress);
        },
        "onError" : function () {
            progressOff(format);
            fileStatus(fid, "error");
        },
        "onFail" : function () {
            progressOff(format);
            fileStatus(fid, "error");
        },
        "silent" : 1
    });
}

/// Functions

function showProgress(fid, progress) {
    if (typeof(progress) === "undefined") progress = 0;
    if (progress < 100) {
        $("#" + fid + " div.plupload_file_button").hide(0, function() {
            $("#" + fid + " div.plupload_file_progress, #" + fid + " div.plupload_file_status").show(0);
        });
    }

    $("#" + fid + " div.plupload_file_progress_bar").css("width", progress + "%");
    var pc = $("#" + fid + " div.plupload_file_status").html();
    $("#" + fid + " div.plupload_file_status").html(pc.replace(/^\d+/, progress));

    if (progress == 100) {
        setTimeout(function() {
            $("#" + fid + " div.plupload_file_progress, #" + fid + " div.plupload_file_status").hide(0, function() {
                $("#" + fid + " div.plupload_file_button").show("fade", 100);
            });
        }, 100);
    }
}

function resetUploader() {
    if (converting) stopConversion(sessionID, converting);
    converting = 0;
    sessionID = randomString();
    uploader.settings.url = origin + "/upload/" + sessionID;
    uploader.splice();
    uploader.refresh();
    convertQueue = [];
    allowProcessing = 0;
    $("#download-all").button("disable");
}

function loadImage(src, callback, loadAttempts) {
    if (loadAttempts <= 0) return;
    $(new Image()).load(function() {
        callback();
    }).attr("src", src).error(function() {
        setTimeout(function(){
            loadImage(src.replace(/\?.*$/, "?" + Math.random()), callback, --loadAttempts);
        }, 200);
    });
}

function loadOriginal(image) {
    progressOn("original");
    loadImage(image.original_url, function() {
        $("#original-preview-info").html(text["js_original"] + ": <b>" + image.file_size_human + "</b> " + image.file_format_human);
        setZoom("#original-preview-image", image.original_url, image.width, image.height);
        zoomers["original"] = 1;
        progressOff("original");
    }, 10);
}

function allSliders(command) {
    $(".param-slider div").each(function() {
        var id = this.id;
        if (sliders[id]) {
            $("#" + id).slider(command);
            if (command == "enable") $("#" + id + "-num").prop("readonly", false).removeClass("ui-state-disabled");
            else $("#" + id + "-num").prop("readonly", true).addClass("ui-state-disabled");
        }
    });
}

function progressOn(format) {
    allowActions = 0;
    $("#" + format + "-preview-progress").show("fade");
    initSpinner(format);
    allSliders("disable");
}

function progressOff(format) {
    allowActions = 1;
    setTimeout(function() {
        $("#" + format + "-preview-progress").hide("fade");
        spinners[format].stop();
    }, 500);
    allSliders("enable");
}

function fileBlock(file) {
    var shortName;
    if (file.name.length > 16) shortName = file.name.slice(0, 9) + "..." + file.name.slice("-" + 5);
    else shortName = file.name;
    return '<li id="' + file.id + '" class=" plupload_file">' +
        '<div class="plupload_file_wrapper ui-widget ui-state-default ui-corner-all">' +
        '<div class="plupload_file_name"><span title="' + file.name + '">' + shortName + '</span></div>' +
        '<div class="plupload_file_action"><div class="plupload_file_icon ui-icon"></div></div>' +
        '<div class="plupload_clearer"></div>' +
        '<div class="plupload_thumb_wrapper"><div class="plupload_thumb"></div><div class="plupload_thumb_extra"></div></div>' +
        '<div class="plupload_file_button">' + text["js_filebutton"] + '</div>' +
        '<div class="plupload_file_progress"><div class="plupload_file_progress_bar" style="width:' + file.percent + '%;"></div></div>' +
        '<div class="plupload_file_status">' + file.percent + '% of ' + plupload.formatSize(file.size).toUpperCase() + '</div>' +
        '</div>' +
    '</li>';
}

function handleStatus(file, image) {
    var actionClass, iconClass;
    if (file.status == plupload.DONE) { actionClass = "plupload_done"; iconClass="ui-icon-circle-close"; }
    if (file.status == plupload.FAILED) { actionClass = "plupload_failed"; iconClass="ui-icon-alert"; }
    if (file.status == plupload.QUEUED) { actionClass = "plupload_delete"; iconClass="ui-icon-circle-minus"; }
    if (file.status == plupload.UPLOADING) { actionClass = "plupload_uploading"; iconClass="ui-icon-circle-arrow-n"; }
    $("#" + file.id).removeClass("plupload_done plupload_failed plupload_delete plupload_uploading").addClass(actionClass);
    $("#" + file.id + " .plupload_file_icon").removeClass("ui-icon-circle-close ui-icon-alert ui-icon-circle-minus ui-icon-circle-arrow-n").addClass(iconClass);
    if (file.hint) $("#" + file.id + " .plupload_file_icon").attr("title", file.hint);
}

function updateList() {
    $.each(uploader.files, function(i, file) {
        handleStatus(file);
        $("#" + file.id + ".plupload_delete div.plupload_file_icon").click(function(e) {
            if ($("#" + file.id + " .plupload_file_wrapper").hasClass("ui-button-inverse")) clearPreview(1);
            uploadCarousel.xCarousel("removeItem", "#" + file.id);
            uploader.removeFile(file);
            if (converting == file.id) {
                converting = 0;
                allowProcessing = 0;
                stopConversion(sessionID, file.id);
            } else {
                removeElem(convertQueue, file.id);
            }
            if (uploader.files.length == 0) {
                resetUploader();
            } else {
                getAutoCompress();
            }
            e.preventDefault();
        });
    });
    $("#pick-files").toggleClass("plupload_disabled", uploader.files.length >= maxQueue);
    $("#reset-all").toggleClass("plupload_disabled", uploader.files.length <= 0);
    if (uploader.files.length == 0) $("#plupload_drop").show("fade");
    updateButtons();
}

function clearPreview(hide) {
    allowProcessing = 0;
    if (clearingSample == 1) return;
    clearingSample = 1;
    if (zoomers["original"]) $("#original-preview-image").smoothZoom("destroy");
    if (zoomers["png"]) $("#png-preview-image").smoothZoom("destroy");
    if (zoomers["jpg"]) $("#jpg-preview-image").smoothZoom("destroy");
    zoomers = [];
    if (hide) {
        $("#content").hide(0, function() { $("#panel").remove(); });
        $("#content-note").show("fade");
        sliders = [];
        fileID = undefined;
    } else {
        $("#original-preview-info, #png-preview-info, #jpg-preview-info").html("");
    }
    params = [];
    clearingSample = 0;
    progress = 0;
}

function updateButtons() {
    $("#carousel-prev, #carousel-next, #pick-files, #reset-all").each(function() {
        if ($(this).hasClass("disabled") || $(this).hasClass("plupload_disabled")) {
            try { $(this).button("disable"); } finally {}
        } else {
            try { $(this).button("enable"); } finally {}
        }
    });
    if (typeof(uploader) == "object") {
        if ($("#pick-files").hasClass("plupload_disabled")) uploader.trigger("DisableBrowse", true);
        else uploader.trigger("DisableBrowse", false);
    }
}

function fileStatus(fid, status) {
    if (status == "uploading" || status == "converting") $("#download-all").button("disable");
    if (status == "waiting") showProgress(fid, 0);
    if (! status) {
        $("#" + fid + " .plupload_thumb").empty();
    } else if (status.indexOf(".") != -1) {
        $("#" + fid + " .plupload_thumb").empty().css({ "background" : "url(" + status + ") center center no-repeat" });
    } else {
        $("#" + fid + " .plupload_thumb").empty().append('<div class="status-wrapper"><div class="status-icon status-' + status + '"></div><div class="status-text">' + text["js_st_" + status] + '</div></div>');
        if (status == "converting") {
            $("#" + fid + " .plupload_file_progress").addClass("progress_extra");
            $("#" + fid + " .plupload_file_progress_bar").css("width", 0);
            var pc = $("#" + fid + " div.plupload_file_status").html();
            $("#" + fid + " div.plupload_file_status").html(pc.replace(/^\d+/, 0));
        }
    }
}

function prettyPolicy() {
    $("pretty-policy").remove();
    $.get(window.location.protocol + "//" + window.location.hostname + "/policy", function(text) {
        $("<div />", {
            "class" : "pretty-policy"
        }).html(text).dialog({
            "width" : 750,
            "modal" : false,
            "resizable" : false,
            "title" : "Privacy Policy",
            "position" : { "my" : "center", "at" : "center", "of" : window }
        });
    });
}

function syncImages(elem) {
    if (syncing == 1) return;
    if (activeImage && elem != "#" + activeImage) return;
    syncing = 1;
    var format = $("#png-preview-image").length ? "png" : "jpg";
    var elem_to;
    if (elem == "#" + format + "-preview-image") elem_to = "#original-preview-image";
    else elem_to = "#" + format + "-preview-image";
    if (typeof($(elem_to)) != "object") return;
    var zoomData = $(elem).smoothZoom("getZoomData");
    $(elem_to).smoothZoom('focusTo', {
        "x" : zoomData.centerX,
        "y" : zoomData.centerY,
        "zoom" : zoomData.ratio * 100
    });
    $(elem_to + " img").css({"left" : $(elem + " img").css("left"), "top" : $(elem + " img").css("top"), "width" : $(elem + " img").css("width"), "height" : $(elem + " img").css("height")});
    syncing = 0;
}

function updateSize() {
    if (winWidth !== $(window).width()) {
        winWidth = $(window).width();
        updateCarousel();
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function() {
            updateCarousel();
        }, 100);
    }
}

function updateCarousel() {
    var w = $("#carousel-wrapper").width() - 44;
    $("#container").css({ "width" : w + "px", "left" : 22 + "px" });
    if (Math.floor(w / 156) !== visibleFiles) {
        visibleFiles = Math.floor(w / 156);
        if (typeof(uploadCarousel) == "object") uploadCarousel.xCarousel("setVisible", visibleFiles);
    }
    winWidth = $(window).width();
}

function fileExt(filename) {
    return filename.split(".").pop().toLowerCase();
}

function removeElem(arr, item) {
    for (var i = arr.length; i--;) {
        if (arr[i] === item) arr.splice(i, 1);
    }
}

function downloadURI(uri, name) {
    if (HTMLElement.prototype.click) {
        var link = document.createElement("a");
        link.download = name;
        link.href = uri;
        link.style.display = "none";
        document.body.appendChild(link);
        link.click();
        setTimeout(function() { link.remove(); }, 500);
    } else {
        window.location.href = uri;
    }
}

function stopConversion(sid, fid) {
//  $.get("stop/" + sid + "/" + fid + "?rnd=" + Math.random());
}
