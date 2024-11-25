
KJE.EnhancedLoanCalc=function(){this.MSG_ERROR1=KJE.parameters.get("MSG_ERROR1","Payment must be greater than zero.");this.MSG_ERROR2=KJE.parameters.get("MSG_ERROR2","Balance must be greater than zero.");this.MSG_ERROR3=KJE.parameters.get("MSG_ERROR3","Term must be greater than zero.");this.MSG_ERROR4=KJE.parameters.get("MSG_ERROR4","Rate must at least zero.");this.MSG_ERROR5=KJE.parameters.get("MSG_ERROR5","Calculated loan balance is less than zero.");this.MSG_ERROR6=KJE.parameters.get("MSG_ERROR6","Calculated term is zero.");this.MSG_ERROR7=KJE.parameters.get("MSG_ERROR7","Calculated loan term exceeds 360 months.");this.MSG_ERROR8=KJE.parameters.get("MSG_ERROR8","Calculated loan balance exceeds MSG_AMOUNT_LIMIT.");this.MSG_ERROR9=KJE.parameters.get("MSG_ERROR9","Calculated interest rate is less than zero.");this.MSG_ERROR10=KJE.parameters.get("MSG_ERROR10","Calculated interest rate exceeds MSG_AMOUNT_LIMIT.");this.MSG_ERROR11=KJE.parameters.get("MSG_ERROR11","Calculated loan payment exceeds MSG_AMOUNT_LIMIT.");this.INPUT_YEARS=KJE.parameters.get("INPUT_YEARS",false);this.CALCULATE_THIS=KJE.EnhancedLoanCalc.CALC_AMOUNT;this.BY_YEAR=false;this.LOAN_AMOUNT=0;this.LOAN_RATE=0;this.MONTHLY_PAYMENT=0;this.TERM=0;this.TOTAL_INTEREST=0;this.PAYOFF="";this.sSchedule=new KJE.Repeating()};KJE.EnhancedLoanCalc.prototype.clear=function(){};KJE.EnhancedLoanCalc.prototype.calculate=function(o){var h=KJE;if(this.INPUT_YEARS){this.TERM=this.TERM*12}if(this.CALCULATE_THIS==KJE.EnhancedLoanCalc.CALC_AMOUNT){if(this.MONTHLY_PAYMENT<=0){throw (this.MSG_ERROR1)}if(this.TERM<=0){throw (this.MSG_ERROR3)}if(this.INTEREST_RATE<0){throw (this.MSG_ERROR4)}this.LOAN_AMOUNT=h.round(KJE.PV(this.INTEREST_RATE/1200,this.TERM,this.MONTHLY_PAYMENT)-0.5,0);if(this.LOAN_AMOUNT<=0){throw (this.MSG_ERROR5)}if(this.LOAN_AMOUNT>=10000000){throw (KJE.replace("MSG_AMOUNT_LIMIT",h.dollars(10000000),this.MSG_ERROR8))}}else{if(this.CALCULATE_THIS==KJE.EnhancedLoanCalc.CALC_TERM){if(this.MONTHLY_PAYMENT<=0){throw (this.MSG_ERROR1)}if(this.LOAN_AMOUNT<=0){throw (this.MSG_ERROR2)}if(this.INTEREST_RATE<0){throw (this.MSG_ERROR4)}this.TERM=KJE.PERIODS(this.INTEREST_RATE/1200,this.MONTHLY_PAYMENT,this.LOAN_AMOUNT);if(this.TERM<=0){throw (this.MSG_ERROR6)}if(this.TERM>=360){throw (this.MSG_ERROR7)}}else{if(this.CALCULATE_THIS==KJE.EnhancedLoanCalc.CALC_RATE){if(this.LOAN_AMOUNT<=0){throw (this.MSG_ERROR2)}if(this.TERM<=0){throw (this.MSG_ERROR3)}if(this.MONTHLY_PAYMENT<=0){throw (this.MSG_ERROR1)}if((this.MONTHLY_PAYMENT*this.TERM)<this.LOAN_AMOUNT){throw (this.MSG_ERROR9)}this.INTEREST_RATE=KJE.RATE(this.TERM,this.MONTHLY_PAYMENT,this.LOAN_AMOUNT)*1200;if(this.INTEREST_RATE>200){throw (KJE.replace("MSG_AMOUNT_LIMIT",h.percent(200),this.MSG_ERROR10))}}else{if(this.LOAN_AMOUNT<=0){throw (this.MSG_ERROR2)}if(this.TERM<=0){throw (this.MSG_ERROR3)}if(this.INTEREST_RATE<0){throw (this.MSG_ERROR4)}this.MONTHLY_PAYMENT=h.round(KJE.PMT(this.INTEREST_RATE/1200,this.TERM,this.LOAN_AMOUNT),2);if(this.MONTHLY_PAYMENT>20000){throw (KJE.replace("MSG_AMOUNT_LIMIT",h.dollars(20000),this.MSG_ERROR11))}}}}var q=Math.round(this.TERM);var l=0;this.DR_BALANCE=KJE.FloatArray(q);this.DR_PRINCIPAL=KJE.FloatArray(q);this.DR_INTEREST=KJE.FloatArray(q);this.DR_MONTHLY_PAYMENT=KJE.FloatArray(q);this.DR_GRAPH_BALANCE=KJE.FloatArray(q);this.TOTAL_INTEREST=0;var d=0;var b=0;var c=this.LOAN_AMOUNT;var a=this.MONTHLY_PAYMENT;var f=0;for(f=0;(f<q);f++){d=h.round(this.INTEREST_RATE/1200*c,2);b=this.MONTHLY_PAYMENT-d;c-=b;if(c<0){a+=c;c=0;b=a-d}else{a=this.MONTHLY_PAYMENT}if(q-1==f){if(c>0.005||c<0.005){a+=c;c=0;b=a-d}else{c=0}}if(this.BY_YEAR){var e=Math.floor(f/12);this.DR_BALANCE[e]=c;this.DR_INTEREST[e]+=d;this.DR_PRINCIPAL[e]+=b;this.DR_MONTHLY_PAYMENT[e]+=d+b}else{this.DR_BALANCE[f]=c;this.DR_INTEREST[f]=d;this.DR_PRINCIPAL[f]=b;this.DR_MONTHLY_PAYMENT[f]=d+b}this.TOTAL_INTEREST+=d;this.DR_GRAPH_BALANCE[f]=c}this.PAYOFF=KJE.getTermLabel(q,true);if(o){var k=this.sSchedule;k.clearRepeat();k.addHeader((this.BY_YEAR?k.sReportCol("Year",2):k.sReportCol("&nbsp;",1)),k.sReportCol("Payment"+(this.BY_YEAR?"s":"")+"",3),k.sReportCol("Interest",4),k.sReportCol("Principal",5),k.sReportCol("Balance",6));k.addRepeat("&nbsp;","&nbsp;","&nbsp;","&nbsp;",h.dollars(this.LOAN_AMOUNT))}var m=0;q=(q);var g=1;if(q>=120){g=12}var j=Math.floor(q/g)+1;this.cats=KJE.FloatArray(j);this.DS_BALANCE=KJE.FloatArray(j);this.cats[m]="0";this.DS_BALANCE[m++]=(this.LOAN_AMOUNT);for(f=1;f<=q;f++){l=f-1;if(f%g==0){this.cats[m]=""+(q<120?m*g:m);this.DS_BALANCE[m++]=this.DR_GRAPH_BALANCE[l]}if(o){if(!this.BY_YEAR){k.addRepeat(f,h.dollars(this.DR_MONTHLY_PAYMENT[l],2),h.dollars(this.DR_INTEREST[l],2),h.dollars(this.DR_PRINCIPAL[l],2),h.dollars(this.DR_BALANCE[l],2))}}}if(o){if(this.BY_YEAR){for(l=0;l<=q&&this.DR_MONTHLY_PAYMENT[l]>0;l++){k.addRepeat((l+1),h.dollars(this.DR_MONTHLY_PAYMENT[l],2),h.dollars(this.DR_INTEREST[l],2),h.dollars(this.DR_PRINCIPAL[l],2),h.dollars(this.DR_BALANCE[l],2))}}}};KJE.EnhancedLoanCalc.prototype.formatReport=function(a){a.dollars("LOAN_AMOUNT",this.LOAN_AMOUNT);a.loanRate("INTEREST_RATE",this.INTEREST_RATE/100);a.dollars("MONTHLY_PAYMENT",this.MONTHLY_PAYMENT);a.number("TERM",this.TERM/12,1);a.number("LOAN_MONTHS",this.TERM);a.replace("PAYOFF",this.PAYOFF);a.dollars("TOTAL_INTEREST",this.TOTAL_INTEREST);a.dollars("TOTAL_OF_PAYMENTS",this.TOTAL_INTEREST+this.LOAN_AMOUNT);a.replace("**REPEATING GROUP**",this.sSchedule.getRepeat())};KJE.EnhancedLoanCalc.CALC_AMOUNT=0;KJE.EnhancedLoanCalc.CALC_RATE=1;KJE.EnhancedLoanCalc.CALC_TERM=2;KJE.EnhancedLoanCalc.CALC_PAYMENT=3;KJE.EnhancedLoanCalc.CALC_INDEX=[KJE.EnhancedLoanCalc.CALC_PAYMENT,KJE.EnhancedLoanCalc.CALC_RATE,KJE.EnhancedLoanCalc.CALC_TERM,KJE.EnhancedLoanCalc.CALC_AMOUNT];KJE.EnhancedLoanCalc.CALC_DESC=KJE.parameters.get("ARRAY_CALC_DESC",["Monthly Payment","Interest rate","Term","Loan amount"]);KJE.CalcName="Enhanced Loan Calculator";KJE.CalcType="EnhancedLoan";KJE.CalculatorTitleTemplate="Your KJE1 loan has a payment of KJE2";KJE.parseInputs=function(b){var a=KJE.getDropBox("CALC_INDEX",KJE.parameters.get("CALC_INDEX",KJE.EnhancedLoanCalc.CALC_PAYMENT),KJE.EnhancedLoanCalc.CALC_INDEX,KJE.EnhancedLoanCalc.CALC_DESC);b=KJE.replace("**CALC_INDEX**",a,b);return b};KJE.initialize=function(){KJE.CalcControl=new KJE.EnhancedLoanCalc();KJE.GuiControl=new KJE.EnhancedLoan(KJE.CalcControl)};KJE.EnhancedLoan=function(h){var g=KJE;var e=KJE.gLegend;var b=KJE.inputs.items;this.tfInput=new Array(4);this.MSG_GRAPH_TITLE1=KJE.parameters.get("MSG_GRAPH_TITLE1","Loan Balance by Year");this.MSG_GRAPH_TITLE2=KJE.parameters.get("MSG_GRAPH_TITLE2","Loan Balance by Month");this.MSG_GRAPH_LBL1=KJE.parameters.get("MSG_GRAPH_LBL1","New balance");this.tfInput[KJE.EnhancedLoanCalc.CALC_AMOUNT]=KJE.DollarSlider("LOAN_AMOUNT","Loan amount",0,10000000,0,1,2);this.tfInput[KJE.EnhancedLoanCalc.CALC_RATE]=KJE.PercentSlider("INTEREST_RATE","Interest rate",0,24,3);if(h.INPUT_YEARS){this.tfInput[KJE.EnhancedLoanCalc.CALC_TERM]=KJE.NumberSlider("TERM","Term in years",1,30,0)}else{this.tfInput[KJE.EnhancedLoanCalc.CALC_TERM]=KJE.NumberSlider("TERM","Term in months",1,360,0,6)}this.tfInput[KJE.EnhancedLoanCalc.CALC_PAYMENT]=KJE.DollarSlider("MONTHLY_PAYMENT","Monthly payment",0,100000,2,1,7);KJE.DropBox("CALC_INDEX","Calculate for",null,null,"bold");KJE.Radioboxes("YEAR","Report amortization",true,"Annually","Monthly");var a=KJE.gNewGraph(KJE.gLINE,"GRAPH1",true,false,KJE.colorList[1],this.MSG_GRAPH_TITLE2);a._legend.setVisible(false);a._iArea=KJE.gGraphLine.AREA_FIRST_ONLY;a._legend._iOrientation=(e.TOP_RIGHT);var f=KJE.parameters.get("MSG_DROPPER_TITLE","Enhanced Loan Inputs:");var d=KJE.parameters.get("MSG_DROPPER_CLOSETITLE","Loan amount KJE1, Payment KJE4, Term of KJE3 at KJE2");var c=function(){return f+KJE.subText(KJE.getKJEReplaced(d,b.LOAN_AMOUNT.getFormatted(),b.INTEREST_RATE.getFormatted(),h.PAYOFF,b.MONTHLY_PAYMENT.getFormatted()),"KJECenter")};KJE.addDropper(new KJE.Dropper("INPUTS",true,f,c),KJE.colorList[0])};KJE.EnhancedLoan.prototype.setValues=function(c){var a=KJE.inputs.items;c.CALCULATE_THIS=a.CALC_INDEX.getValue();c.LOAN_AMOUNT=a.LOAN_AMOUNT.getValue();c.INTEREST_RATE=a.INTEREST_RATE.getValue();c.MONTHLY_PAYMENT=a.MONTHLY_PAYMENT.getValue();c.TERM=a.TERM.getValue();c.BY_YEAR=a.YEAR.getValue();var b=KJE.EnhancedLoanCalc.CALC_INDEX.length;for(var d=0;d<b;d++){if(c.CALCULATE_THIS==d){this.tfInput[d].disable()}else{this.tfInput[d].enable()}}};KJE.EnhancedLoan.prototype.refresh=function(e){var d=KJE;var c=KJE.gLegend;var b=KJE.inputs.items;var a=KJE.gGraphs[0];KJE.setTitleTemplate(d.dollars(e.LOAN_AMOUNT),d.dollars(e.MONTHLY_PAYMENT,2));a.removeAll();a.setGraphCategories(e.cats);if(e.TERM>120){a.setTitle(this.MSG_GRAPH_TITLE1)}else{a.setTitle(this.MSG_GRAPH_TITLE2)}a.add(new KJE.gGraphDataSeries(e.DS_BALANCE,this.MSG_GRAPH_LBL1,a.getColor(1)));a.paint();this.tfInput[KJE.EnhancedLoanCalc.CALC_AMOUNT].setText(d.dollars(e.LOAN_AMOUNT),true);this.tfInput[KJE.EnhancedLoanCalc.CALC_RATE].setText(d.percent(e.INTEREST_RATE/100,3),true);this.tfInput[KJE.EnhancedLoanCalc.CALC_PAYMENT].setText(d.dollars(e.MONTHLY_PAYMENT,2),true);this.tfInput[KJE.EnhancedLoanCalc.CALC_TERM].setText(d.number(e.INPUT_YEARS?e.TERM/12:e.TERM),true)};KJE.InputScreenText=" <div id=KJE-D-INPUTS><div id=KJE-P-INPUTS>Input information:</div></div> <div id=KJE-E-INPUTS > <div id=\"KJE-C-CALC_INDEX\">**CALC_INDEX**</div> <div id='KJE-C-LOAN_AMOUNT'><input id='KJE-LOAN_AMOUNT' /></div> <div id='KJE-C-INTEREST_RATE'><input id='KJE-INTEREST_RATE' /></div> <div id='KJE-C-MONTHLY_PAYMENT'><input id='KJE-MONTHLY_PAYMENT' /></div> <div id='KJE-C-TERM'><input id='KJE-TERM' /></div> <div id=\"KJE-C-YEAR\"><fieldset id='KJE-FS-YEAR'><input id=\"KJE-YEAR1\" type=radio name=YEAR /><input id=\"KJE-YEAR2\" type=radio name=YEAR /></fieldset></div> <div class=KJEDropperSpacer></div> </div> **GRAPH1** ";KJE.DefinitionText=" <div id='KJE-D-MONTHLY_PAYMENT' ><dt>Monthly payment</dt><dd>Monthly payment for this loan.</dd></div> <div id='KJE-D-INTEREST_RATE' ><dt>Interest rate</dt><dd>Annual interest rate for this loan. Interest is calculated monthly on the current outstanding balance of your loan at 1/12 of the annual rate.</dd></div> <div id='KJE-D-TERM' ><dt>Term in months</dt><dd>Number of months for this loan.</dd></div> <div id='KJE-D-LOAN_AMOUNT' ><dt>Loan amount</dt><dd>Total amount of your loan.</dd></div> ";KJE.ReportText=' <!--HEADING "Enhanced Loan Calculator Results" HEADING--> <h2 class=\'KJEReportHeader KJEFontHeading\'>Your LOAN_AMOUNT loan has a MONTHLY_PAYMENT monthly payment for LOAN_MONTHS months.</h2> If you make all of your payments on this loan, and do not prepay any of the principal, the total interest for this loan is TOTAL_INTEREST. **GRAPH** <p> <div class=KJEReportTableDiv><table class=KJEReportTable><caption class=\'KJEHeaderRow KJEHeading\'>Results Summary</caption> <tbody class=\'KJEReportTBody\'> <tr class=KJEOddRow><th class="KJELabel KJECellBorder KJECell60" scope=\'row\'>Monthly payment</th><td class="KJECell KJECell40">MONTHLY_PAYMENT</td></tr> <tr class=KJEEvenRow><th class="KJELabel KJECellBorder" scope=\'row\'>Loan amount</th><td class="KJECell">LOAN_AMOUNT</td></tr> <tr class=KJEOddRow><th class="KJELabel KJECellBorder" scope=\'row\'>Interest rate</th><td class="KJECell">INTEREST_RATE</td></tr> <tr class=KJEEvenRow><th class="KJELabel KJECellBorder" scope=\'row\'>Term</th><td class="KJECell">LOAN_MONTHS months</td></tr> <tr class=KJEOddRow><th class="KJELabel KJECellBorder" scope=\'row\'>Total interest </th><td class="KJECell">TOTAL_INTEREST</td></tr> </tbody> </table> </div> <h2 class=\'KJEScheduleHeader KJEFontHeading\'>Payment Schedule</h2> **REPEATING GROUP** ';
// 01/02/2024 Copyright 2024 KJE Computer Solutions, Inc.  Licensed for use on data2.profitstarscms.com denmarkstate.com ramseybank.com www.centurybanknet.com foresightbank.com fnb-hartford.com

