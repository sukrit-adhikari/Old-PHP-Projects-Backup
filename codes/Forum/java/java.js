function categoryexpand()
{

if(document.getElementById('category').value=='school')
{
document.getElementById('topic').innerHTML="<option>Choose your topic</option><option>Mechanics</option><option>Heat</option><option>Light</option><option>Astronomy and Geology</option>"
}

if(document.getElementById('category').value=='plus2')
{
document.getElementById('topic').innerHTML="<option>Choose your topic</option><option>Mechanics</option><option>Heat and Thermodynamics</option><option>Light</option><option>Electrostatics and Electricity</option><option>Quantum/Modern Physics</option>"
}

if(document.getElementById('category').value=='bachelors')
{
document.getElementById('topic').innerHTML="<option>Choose your topic</option><option>Mechanics</option><option>Heat and Thermodynamics</option><option>Light</option><option>Electrostatics and Electricity</option><option>Quantum/Modern Physics</option>"
}

if(document.getElementById('category').value=='masters')
{
document.getElementById('topic').innerHTML="<option>Choose your topic</option><option>Mechanics</option><option>Heat and Thermodynamics</option><option>Light</option><option>Electrostatics and Electricity</option><option>Quantum/Modern Physics</option>"
}

if(document.getElementById('category').value=='engineering')
{
document.getElementById('topic').innerHTML="<option>Choose your topic</option><option>Electrical and Computer</option><option>Electronics</option><option>Mechanical</option><option>Software</option><option>Civil</option>"
}
}

function category_expand_search()
{

if(document.getElementById('category_search').value=='school')
{
document.getElementById('topic_search').innerHTML="<option>Choose your topic</option><option>Mechanics</option><option>Heat</option><option>Light</option><option>Astronomy and Geology</option>"
}

if(document.getElementById('category_search').value=='plus2')
{
document.getElementById('topic_search').innerHTML="<option>Choose your topic</option><option>Mechanics</option><option>Heat and Thermodynamics</option><option>Light</option><option>Electrostatics and Electricity</option><option>Quantum/Modern Physics</option>"
}

if(document.getElementById('category_search').value=='bachelors')
{
document.getElementById('topic_search').innerHTML="<option>Choose your topic</option><option>Mechanics</option><option>Heat and Thermodynamics</option><option>Light</option><option>Electrostatics and Electricity</option><option>Quantum/Modern Physics</option>"
}

if(document.getElementById('category_search').value=='masters')
{
document.getElementById('topic_search').innerHTML="<option>Choose your topic</option><option>Mechanics</option><option>Heat and Thermodynamics</option><option>Light</option><option>Electrostatics and Electricity</option><option>Quantum/Modern Physics</option>"
}

if(document.getElementById('category_search').value=='engineering')
{
document.getElementById('topic_search').innerHTML="<option value='Unspecified'>Choose your topic</option><option>Electrical and Computer</option><option>Electronics</option><option>Mechanical</option><option>Software</option><option>Civil</option>"
}
}




function showtermsandcondtions()
{
document.getElementById('termsandconditions').innerHTML="<strong><ul><li>I will not post unrelated questions.</li><li>I will be respectful to other users.</li><li>I understand that my email address will be permanently stored and can be used against me if i abuse Nepali Physics Forum.</li></ul></strong>";
}

function hide_question_form()
{
if(document.getElementById('question_form').style.visibility=="visible")
{
document.getElementById('question_form').style.visibility="collapse";
document.getElementById('hide_show_link').innerHTML="Show";
}
else
{
document.getElementById('question_form').style.visibility="visible";
document.getElementById('hide_show_link').innerHTML="Hide X";

}
}