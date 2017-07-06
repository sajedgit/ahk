/*************************************************
 *  All Functions      
 *************************************************
*/
grid()
{
   InputBox,grid_input1,Create Grid Column, How many column you want?
	counter:= grid_input1
	tot:=floor(12/counter)
	Loop,%counter%
	{
		Send, <div class="col-lg-%tot% col-md-%tot% col-sm-%tot% col-xs-%tot% "> `r`n </div>`r`n
		
		
	}
}

column()
{
  	InputBox, input2,Create a column, Enter the no of grid?
	
   Send, <div class="col-lg-%input2% col-md-%input2% col-sm-%input2% col-xs-%input2% "> `r`n
 

         </div>
}


getOffeset()
{
InputBox, input,Create Offset, Enter offset no?
Send, col-lg-offset-%input% col-md-offset-%input% col-sm-offset-%input% col-xs-offset-%input% 
}


^l::
Send Sincerely,{enter}John Smith  ; This line sends keystrokes to the active (foremost) window.
return
 

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

 



::style:: 
(

<style>
.test{

}

</style>
)
::script:: 
(
<script>


</script>
)
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

