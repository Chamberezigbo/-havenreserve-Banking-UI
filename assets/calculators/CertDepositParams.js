


  KJE.parameters.set("COMPOUND_INTEREST",KJE.CertDepositCalc.COMPOUND_ANNUALLY);
  KJE.parameters.set("STARTING_AMOUNT",1000);
  KJE.parameters.set("MONTHS",60);
  KJE.parameters.set("RATE_OF_RETURN",KJE.Default.RORSave);
  KJE.parameters.set("MIN_STARTING_AMOUNT",0);
  KJE.parameters.set("TOTAL_YIELD_HIDE",true);
  KJE.parameters.set("TOTAL_YIELD2_HIDE",true);



KJE.ReportProcess = function(sText) {
sText= KJE.replace("appraised","assessed value",sText);
sText= KJE.replace("Appraised","Assessed value",sText);
return KJE.replace("value value","value",sText);
}


KJE.parseDefinitions = function(sText) {
sText= KJE.replace("appraised","assessed value",sText);
sText= KJE.replace("Appraised","Assessed value",sText);
return KJE.replace("value value","value",sText);
}
/**V3_CUSTOM_CODE**/
/* <!--
  Financial Calculators, &copy;1998-2022 KJE Computer Solutions, Inc.
  For more information please see:
  <A HREF="https://www.dinkytown.net">https://www.dinkytown.net</A>
 -->
 */


