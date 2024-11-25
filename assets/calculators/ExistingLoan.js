
KJE.ExistingLoanCalc=function(){this.MONTHS_LEFT=0;this.MONTHLY_PAYMENT=0;this.LOAN_AMOUNT=0;this.INTEREST_RATE=0;this.CURRENT_BALANCE=0;this.TERM=0;this.TOTAL_OF_PAYMENTS=0;this.TOTAL_OF_REMAINING=0;this.INTEREST_PAID=0;this.INTEREST_REMAINING=0;this.DS_BALANCE=null;this.DS_BALANCE2=null;this.cats=null;this.LNW_ERROR=KJE.parameters.get("ARRAY_MSG_ERROR",["payment must be greater than zero.","balance must be greater than zero.","term must be greater than zero.","interest exceeds 100%.","interest is less than 0%.","Payment is less than interest due"]);this.MSG_SUMMARY=KJE.parameters.get("MSG_SUMMARY","You have paid a total of CALC_TOTAL_PAYMENT after CALC_MONTHS_TODATE monthly payments. This includes CALC_INTEREST in interest. If you continue to make your regular monthly payments you will pay an additional CALC_REMAINING_INTEREST in interest over the next CALC_MONTHS_LEFT months.");this.MSG_GRAPH_REPORT_TITLE=KJE.parameters.get("MSG_GRAPH_REPORT_TITLE","Current outstanding balance is CURRENT_BALANCE.");this.sSchedule=new KJE.Repeating()};KJE.ExistingLoanCalc.prototype.clear=function(){};KJE.ExistingLoanCalc.prototype.calculate=function(t){var e=KJE;var g=this.MONTHLY_PAYMENT;var o=this.LOAN_AMOUNT;var w=this.TERM;var u=this.MONTHS_LEFT;var c=0;if((g+w+o)<=0){this.CURRENT_BALANCE=0;u=0;c=0}else{if(g<=0){throw new (this.LNW_ERROR[0])}if(o<=0){throw new (this.LNW_ERROR[1])}if(w<=0){throw new (this.LNW_ERROR[2])}c=KJE.RATE(w,g,o);this.SEMI_ANNUAL_INTEREST_RATE=(Math.pow(1+(c),6)-1)*(200)}this.INTEREST_RATE=c*1200;var a=o;var k=0;var v=0;if(u<=0){u=0;this.CURRENT_BALANCE=0}else{if(u>w){u=w}for(var p=1;p<=(w-u);p++){k=(a*(c));v=g-k;a-=v}this.CURRENT_BALANCE=a}this.TOTAL_OF_PAYMENTS=0;this.INTEREST_PAID=0;this.INTEREST_REMAINING=0;this.TOTAL_OF_REMAINING=0;var j=Math.round(this.TERM);var r=0;var h=j;if(j>120){h=Math.ceil(j/12)}else{if(j>48){h=Math.ceil(j/2)}else{h=j}}this.DS_BALANCE=KJE.FloatArray(h+1);this.DS_BALANCE2=KJE.FloatArray(h+1);this.cats=new Array(h+1);if(t){var f=this.sSchedule;f.clearRepeat();f.addHeader(f.sReportCol("#",1),f.sReportCol("Payment",2),f.sReportCol("Principal",3),f.sReportCol("Interest",4),f.sReportCol("Loan balance",5));f.addRepeat("&nbsp;","&nbsp;","&nbsp;","&nbsp;",e.dollars(this.LOAN_AMOUNT))}var b=this.LOAN_AMOUNT;var s=0;var x=0;var d=this.MONTHLY_PAYMENT;if(this.TERM==this.MONTHS_LEFT){this.DS_BALANCE[0]=(this.LOAN_AMOUNT);this.DS_BALANCE2[0]=0}else{this.DS_BALANCE[0]=(this.LOAN_AMOUNT);this.DS_BALANCE2[0]=0}this.cats[0]="0";var l=0;var m=true;for(var p=1;p<=j;p++){r=p-1;if(j>120){m=((r%12)==0)}else{if(j>48){m=((r%2)==0)}else{m=true}}s=e.round(c*b,2);x=this.MONTHLY_PAYMENT-s;b-=x;if(b<0){d+=b;b=0;x=d-s}else{d=this.MONTHLY_PAYMENT}if(j==p){if(b>0.005){d+=b;b=0;x=d-s}else{b=0}}if(p>this.TERM-this.MONTHS_LEFT){this.INTEREST_REMAINING+=s;this.TOTAL_OF_REMAINING+=d}else{this.INTEREST_PAID+=s;this.TOTAL_OF_PAYMENTS+=d}if(m){if(j>120){this.cats[l+1]=""+Math.floor((p+12)/12)}else{this.cats[l+1]=""+p}if(p>this.TERM-this.MONTHS_LEFT){this.DS_BALANCE[l+1]=0;this.DS_BALANCE2[l+1]=(b)}else{this.DS_BALANCE[l+1]=(b);this.DS_BALANCE2[l+1]=0}l+=1}if(t){f.addRepeat(e.number(p),e.dollars(d,2),e.dollars(x,2),e.dollars(s,2),e.dollars(b,2))}}};KJE.ExistingLoanCalc.prototype.formatReport=function(a){a.dollars("CURRENT_BALANCE",this.CURRENT_BALANCE);a.number("MONTHS_LEFT",this.MONTHS_LEFT);a.dollars("MONTHLY_PAYMENT",this.MONTHLY_PAYMENT);a.loanRate("INTEREST_RATE",this.INTEREST_RATE/100);a.number("TERM",this.TERM);a.dollars("LOAN_AMOUNT",this.LOAN_AMOUNT);a.dollars("INTEREST_PAID",this.INTEREST_PAID);a.dollars("INTEREST_REMAINING",this.INTEREST_REMAINING);a.dollars("TOTAL_OF_PAYMENTS",this.TOTAL_OF_PAYMENTS);a.dollars("TOTAL_OF_REMAINING",this.TOTAL_OF_REMAINING);a.number("MONTHS_TODATE",this.TERM-this.MONTHS_LEFT);a.replace("**REPEATING GROUP**",this.sSchedule.getRepeat())};KJE.ExistingLoanCalc.prototype.formatGraph=function(a,b){b[0].setTitle("");b[0].setTitleGraph("");b[0].show(true);b[0].paint()};KJE.ExistingLoanCalc.prototype.getGraphTitle=function(b){var a=this.MSG_GRAPH_REPORT_TITLE+"<div class='KJESubTitle KJELeft'>"+this.MSG_SUMMARY+"</div>";if(b){a=KJE.replace("CALC_MONTHS_LEFT",KJE.number(this.MONTHS_LEFT),KJE.replace("CALC_REMAINING_INTEREST",KJE.dollars(this.INTEREST_REMAINING),KJE.replace("CALC_INTEREST",KJE.dollars(this.INTEREST_PAID),KJE.replace("CALC_MONTHS_TODATE",KJE.number(this.TERM-this.MONTHS_LEFT),KJE.replace("CALC_TOTAL_PAYMENT",KJE.dollars(this.TOTAL_OF_PAYMENTS),a)))));a=KJE.replace("CURRENT_BALANCE",KJE.dollars(this.CURRENT_BALANCE),a)}return a};KJE.CalcName="Existing Loan Calculator";KJE.CalcType="ExistingLoan";KJE.CalculatorTitleTemplate="Existing Loan Calculator";KJE.parseInputs=function(a){return a};KJE.initialize=function(){KJE.CalcControl=new KJE.ExistingLoanCalc();KJE.GuiControl=new KJE.ExistingLoan(KJE.CalcControl)};KJE.ExistingLoan=function(f){var e=KJE;var c=KJE.gLegend;var b=KJE.inputs.items;this.MSG_GRAPH1=KJE.parameters.get("MSG_GRAPH1","Starting balance");this.MSG_GRAPH2=KJE.parameters.get("MSG_GRAPH2","Current balance");this.MSG_GRAPH3=KJE.parameters.get("MSG_GRAPH3","Balance by year");this.MSG_GRAPH4=KJE.parameters.get("MSG_GRAPH4","Balance by month");this.MSG_SUMMARY_TITLE=KJE.parameters.get("MSG_SUMMARY_TITLE","Existing loan summary");this.MSG_ENDING_BALANCE=KJE.parameters.get("MSG_ENDING_BALANCE","Ending balance KJE1");KJE.DollarSlider("MONTHLY_PAYMENT","Monthly payment",0,100000,2,1,1);KJE.DollarSlider("LOAN_AMOUNT","Loan amount",0,10000000,0,1,2);KJE.Label("INTEREST_RATE","Interest rate");KJE.Label("CURRENT_BALANCE","Current balance");KJE.NumberSlider("TERM","Term in months",1,KJE.parameters.get("TERM_MAXIMUM_MONTHS",360));KJE.NumberSlider("MONTHS_LEFT","Months left",1,KJE.parameters.get("TERM_MAXIMUM_MONTHS",360));var a=KJE.gNewGraph(KJE.gSTACKED,"GRAPH1",true,false,KJE.colorList[1],f.getGraphTitle());a._axisX._fSpacingPercent=0.25;a._legend.setVisible(false);var d=KJE.parameters.get("MSG_DROPPER_TITLE","Existing loan inputs:");KJE.addDropper(new KJE.Dropper("INPUTS",true,d,d),KJE.colorList[0])};KJE.ExistingLoan.prototype.setValues=function(b){var a=KJE.inputs.items;b.MONTHLY_PAYMENT=a.MONTHLY_PAYMENT.getValue();b.CURRENT_BALANCE=a.CURRENT_BALANCE.getValue();b.LOAN_AMOUNT=a.LOAN_AMOUNT.getValue();b.TERM=a.TERM.getValue();b.MONTHS_LEFT=a.MONTHS_LEFT.getValue();b.INTEREST_RATE=a.INTEREST_RATE.getValue()};KJE.ExistingLoan.prototype.refresh=function(f){var e=KJE;var c=KJE.gLegend;var b=KJE.inputs.items;var a=KJE.gGraphs[0];KJE.setTitleTemplate(e.dollars(f.CURRENT_BALANCE));a.removeAll();a.setTitle(f.getGraphTitle(true));a.setGraphCategories(f.cats);var d=KJE.getKJEReplaced(this.MSG_ENDING_BALANCE,(f.TERM>120?KJE.MSG_YEAR_LBL:KJE.MSG_MONTH_LBL));a.add(new KJE.gGraphDataSeries(f.DS_BALANCE,this.MSG_GRAPH1+" ",a.getColor(1),e.dollars(f.LOAN_AMOUNT),d));a.add(new KJE.gGraphDataSeries(f.DS_BALANCE2,this.MSG_GRAPH2+" ",a.getColor(2),e.dollars(f.CURRENT_BALANCE),d));if(f.TERM>120){a._titleXAxis.setText(this.MSG_GRAPH3)}else{a._titleXAxis.setText(this.MSG_GRAPH4)}a.paint();b.INTEREST_RATE.setText(KJE.percent(f.INTEREST_RATE/100,3),true);b.CURRENT_BALANCE.setText(KJE.dollars(f.CURRENT_BALANCE,2),true)};KJE.InputScreenText=" <div id=KJE-D-INPUTS><div id=KJE-P-INPUTS>Input information:</div></div> <div id=KJE-E-INPUTS > <div id='KJE-C-LOAN_AMOUNT'><input id='KJE-LOAN_AMOUNT' /></div> <div id='KJE-C-MONTHLY_PAYMENT'><input id='KJE-MONTHLY_PAYMENT' /></div> <div id='KJE-C-TERM'><input id='KJE-TERM' /></div> <div id='KJE-C-MONTHS_LEFT'><input id='KJE-MONTHS_LEFT' /></div> <div id='KJE-C-INTEREST_RATE'><div id='KJE-INTEREST_RATE'></div></div> <div class=KJEDropperSpacer></div> </div> **GRAPH1** ";KJE.DefinitionText=" <div id='KJE-D-LOAN_AMOUNT' ><dt>Loan amount</dt><dd>Your original balance when you received this loan.</dd></div> <div id='KJE-D-MONTHLY_PAYMENT' ><dt>Monthly payment</dt><dd>Your monthly payment for this loan.</dd></div> <div id='KJE-D-TERM' ><dt>Term in months</dt><dd>Total number of months for this loan.</dd></div> <div id='KJE-D-INTEREST_RATE' ><dt>Interest rate</dt><dd>The interest rate you pay on this loan. This value is calculated based on your monthly payment, loan balance and term.</dd></div> <div id='KJE-D-MONTHS_LEFT' ><dt>Months left</dt><dd>Total number of months left to pay on this loan.</dd></div> <div id='KJE-D-CURRENT_BALANCE' ><dt>Current balance</dt><dd>Your current outstanding balance for this loan. This value is calculated based on the number of months you have remaining to pay.</dd></div> ";KJE.ReportText=' <!--HEADING "Existing Loan Calculator" HEADING--> <h2 class=\'KJEReportHeader KJEFontHeading\'>Your current outstanding balance for this loan is CURRENT_BALANCE.</h2> You have paid a total of TOTAL_OF_PAYMENTS after MONTHS_TODATE monthly payments. This includes INTEREST_PAID in interest. If you continue to make your regular monthly payments you will pay an additional INTEREST_REMAINING in interest over the next MONTHS_LEFT months. **GRAPH** <div class=KJEReportTableDiv><table class=KJEReportTable><caption class=\'KJEHeaderRow KJEHeading\'>Loan summary</caption> <tbody class=\'KJEReportTBody\'> <tr class=KJEOddRow><th class="KJELabel KJECellBorder KJECell70" scope=\'row\'>Monthly payment</th><td class="KJECell">MONTHLY_PAYMENT</td></tr> <tr class=KJEEvenRow><th class="KJELabel KJECellBorder" scope=\'row\'>Loan amount</th><td class="KJECell">LOAN_AMOUNT</td></tr> <tr class=KJEOddRow><th class="KJELabel KJECellBorder" scope=\'row\'>Interest rate</th><td class="KJECell">INTEREST_RATE</td></tr> <tr class=KJEEvenRow><th class="KJELabel KJECellBorder" scope=\'row\'>Term</th><td class="KJECell">TERM months</td></tr> <tr class=KJEOddRow><th class="KJELabel KJECellBorder" scope=\'row\'>Payments left</th><td class="KJECell">MONTHS_LEFT monthly payments</td></tr> </tbody> <tfoot class=\'KJEReportTFooter\'> <tr class=KJEFooterRow><th class="KJELabel KJECellBorder" scope=\'row\'>Current balance</th><td class="KJECellStrong">CURRENT_BALANCE</td></tr> <tr class=KJEFooterRow><th class="KJELabel KJECellBorder" scope=\'row\'>Interest paid</th><td class="KJECellStrong">INTEREST_PAID</td></tr> </tfoot> </table> </div> <h2 class=\'KJEScheduleHeader KJEFontHeading\'>Payment Schedule</h2> **REPEATING GROUP** ';
// 01/02/2024 Copyright 2024 KJE Computer Solutions, Inc.  Licensed for use on data2.profitstarscms.com denmarkstate.com ramseybank.com www.centurybanknet.com foresightbank.com fnb-hartford.com

