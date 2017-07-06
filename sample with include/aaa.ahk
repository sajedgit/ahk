 #include MyCustomFunction.ahk
 
 ^k::
 InputBox, input,Create code by AHK, Enter your keyword 
  
if (input="col")
{
 column()
}
else if(input="grid")
{
	grid()

}
else if(input="offset")
{
getOffeset()
}
else
   Send, Nothing
 
Return

::img::<img src="" class="img-responsive"> 

 



::dummy::
(
Any text between the top and bottom parentheses is treated literally, including commas and percent signs.
By default, the hard carriage return (Enter) between the previous line and this one is also preserved.
By default, the indentation (tab) to the left of this line is preserved.See continuation section for how to change these default behaviors.
)

::gridstr::
(
<div class = "container">
<div class = "row">
<div class = "col-lg-6 col-md-6 col-sm-6 col-xs-6 "></div>
<div class = "col-lg-6 col-md-6 col-sm-6 col-xs-6 "></div>
</div>
<div class = "row"></div>
</div>
<div class = "container">
</div>
)

