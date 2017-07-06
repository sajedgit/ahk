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