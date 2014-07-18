var dt = {};
dt.post = function(args){
	args.type = "POST";
	dt.request(args);
}

dt.get = function(args){
	args.type = "GET";
	dt.request(args);
}

dt.request = function(args){
	params = $(args.form).serializeObject();
	data = (typeof args.data === "undefined" || args.data==null ?{}:args.data);
	$.each(data,function(idx,item){
		params[idx]=item;
	});
	params.dt_async=true;
	$.each(params,function(idx,item){
		if(item.push)
			params[idx] = JSON.stringify(item);
	});

	$.ajax({
	    type: args.type,
	    url: args.url,
	    data: params,
	    dataType: "jsonp",
	    statusCode:{
	    	278: function (data){ //custom client redirect code
	    		window.location.replace(data.obj.location);
	    	}
	    },
	    success: function(data,responseText){
	    	if(args!=null && typeof args.success !== "undefined")
		    	args.success(data.obj);
	    }
	});
}

//** allows file uploads -- requires jquery.iframe-transport.js */
dt.upload = function(args){
	params = $(args.form).serializeObject();
	data = (typeof args.data === "undefined" || args.data==null ?{}:args.data);
	$.each(data,function(idx,item){
		params[idx]=item;
	});
	params.dt_async=true;
	$.each(params,function(idx,item){
		if(item.push)
			params[idx] = JSON.stringify(item);
	});
		
	$.ajax({
	    type: "POST",
	    url: args.url,
	    data: params,
	    dataType: "jsonp",
	    statusCode:{
	    	278: function (data){ //custom client redirect code
	    		window.location.replace(data.obj.location);
	    	}
	    },
	    success: function(data,responseText){
	    	if(args!=null && typeof args.success !== "undefined")
		    	args.success(data.obj);
	    },
	    files: $(":file"),
		iframe: true,
		processData: false
	});
}

$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};