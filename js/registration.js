function alertExperienceCheck()
{
	var x = document.getElementsByClassName("education_only");
	var radios = document.getElementsByName("education");
	for(var i = 0; i < radios.length; i++)
	{
		if(radios[i].checked)
		{
			if(radios[i].value == "yes")
			{
				for(var i = 0; i < x.length; i++)
				{
					x[i].style.display = 'block';
				}
			}
			else if(radios[i].value == "no"){
				for(var i = 0; i < x.length; i++)
				{
					x[i].style.display = 'none';
				}
			}
		}
	}
}

function alertMinorCheck(checkboxElement)
{
	var x = document.getElementsByClassName("minor_only");
	for(var i = 0; i < x.length; i++)
	{
		if(checkboxElement.checked == true)
		{
			x[i].style.display = 'block';
		}
		else
		{
			x[i].style.display = 'none';
		}
	}
}