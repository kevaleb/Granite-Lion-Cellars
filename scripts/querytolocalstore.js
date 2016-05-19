
persistentQueryString = {};

function saveQueryToLocalStore()
{
	var query = window.location.search.substring(1)
	var vars = query.split("&");
	if(query.length > 0)
	{
		for (var i=0;i<vars.length;i++)
		{
			var pair = vars[i].split("=")

			localStorage[pair[0]] = decodeURIComponent(pair[1]);
		}
	}
	persistentQueryString = localStorage;
}

function saveQueryToObject()
{
	var query = window.location.search.substring(1)
	var vars = query.split("&");

	if(query.length > 0)
	{
		for (var i=0;i<vars.length;i++)
		{
			var pair = vars[i].split("=")

			persistentQueryString[pair[0]] = decodeURIComponent(pair[1]);
		}
	}
}

function supports_html5_storage()
{
	try
	{
		return 'localStorage' in window && window['localStorage'] !== null;
	}
	catch (e)
	{
		return false;
	}
}

if(supports_html5_storage())
{
	saveQueryToLocalStore();
}
else
{
	saveQueryToObject();
}



