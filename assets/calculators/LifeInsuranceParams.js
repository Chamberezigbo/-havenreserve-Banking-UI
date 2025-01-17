


  KJE.parameters.set("CASH_AND_SAVINGS",5000);
  KJE.parameters.set("CHECK_BOX",false);
  KJE.parameters.set("CHILDRENS_COLLEGE_EXPENSES",0);
  KJE.parameters.set("CHILD_CARE_EXPENSES",500);
  KJE.parameters.set("COLLEGE_FUND_CHILD_2",0);
  KJE.parameters.set("COLLEGE_FUND_CHILD_3",0);
  KJE.parameters.set("COLLEGE_FUND_FOR_CHILD_1",0);
  KJE.parameters.set("COMBINED_FEDERAL_AND_STATE_TAX_RATE",25);
  KJE.parameters.set("DEBT_REPAYMENT",5000);
  KJE.parameters.set("DURATION_CHILDRENS_COLLEGE_EXPENSES",0);
  KJE.parameters.set("DURATION_CHILD_CARE_EXPENSES",7);
  KJE.parameters.set("DURATION_LIVING_EXPENSES_WITH_CHILDREN_AT_HOME_",10);
  KJE.parameters.set("DURATION_LIVING_EXPENSES_WITH_CHILDREN_GONE",40);
  KJE.parameters.set("DURATION_OTHER_EXPENSES",0);
  KJE.parameters.set("DURATION_OTHER_INCOME",0);
  KJE.parameters.set("DURATION_RETRAINING_AND_EDUCATION_FOR_SPOUSE",0);
  KJE.parameters.set("DURATION_SOCIAL_SECURITY_SURVIVOR_BENEFITS_CHILDREN_AT_HOME",10);
  KJE.parameters.set("DURATION_SOCIAL_SECURITY_SURVIVOR_BENEFITS_CHILDREN_GONE",40);
  KJE.parameters.set("DURATION_SPOUSE_INCOME_FROM_WORK",20);
  KJE.parameters.set("ESTATE_OR_INHERITANCE_TAXES_ON_ASSETS",0);
  KJE.parameters.set("FUNERAL_COSTS",7500);
  KJE.parameters.set("HOME_EQUITY",15000);
  KJE.parameters.set("INFLATION_RATE",KJE.Default.InflationRate);
  KJE.parameters.set("INVESTMENTS",10000);
  KJE.parameters.set("LIFE_INSURANCE_REQUIRED_TO_COVER_SHORTFALL",666);
  KJE.parameters.set("LIVING_EXPENSES_WITH_CHILDREN_AT_HOME",2000);
  KJE.parameters.set("LIVING_EXPENSES_WITH_CHILDREN_GONE",1500);
  KJE.parameters.set("NUMBER_OF_YEARS_YOU_WISH_INSURANCE_TO_COVER",50);
  KJE.parameters.set("OTHER",0);
  KJE.parameters.set("OTHER_ATDEATH_EXPENSES",0);
  KJE.parameters.set("OTHER_EXPENSES",0);
  KJE.parameters.set("OTHER_INCOME",0);
  KJE.parameters.set("PROBATE_COSTS",500);
  KJE.parameters.set("RATE_EARNED_ON_SAVINGS_AND_INVESTMENTS",KJE.Default.RORSave);
  KJE.parameters.set("RETRAINING_AND_EDUCATION_FOR_SPOUSE",0);
  KJE.parameters.set("SIMPLE_INPUTS",false);
  KJE.parameters.set("SOCIAL_SECURITY_SURVIVOR_BENEFITS_CHILDREN_AT_HOME",0);
  KJE.parameters.set("SOCIAL_SECURITY_SURVIVOR_BENEFITS_CHILDREN_GONE",0);
  KJE.parameters.set("SPOUSE_INCOME_FROM_WORK",2000);
  KJE.parameters.set("UNINSURED_MEDICAL_COSTS",2000);
  KJE.parameters.set("YEARS_UNTIL_START_CHILDRENS_COLLEGE_EXPENSES",0);
  KJE.parameters.set("YEARS_UNTIL_START_CHILD_CARE_EXPENSES",0);
  KJE.parameters.set("YEARS_UNTIL_START_LIVING_EXPENSES_WITH_CHILDREN_AT_HOME_",0);
  KJE.parameters.set("YEARS_UNTIL_START_LIVING_EXPENSES_WITH_CHILDREN_GONE",10);
  KJE.parameters.set("YEARS_UNTIL_START_OTHER_EXPENSES",0);
  KJE.parameters.set("YEARS_UNTIL_START_OTHER_INCOME",0);
  KJE.parameters.set("YEARS_UNTIL_START_RETRAINING_AND_EDUCATION_FOR_SPOUSE",0);
  KJE.parameters.set("YEARS_UNTIL_START_SOCIAL_SECURITY_SURVIVOR_BENEFITS_CHILDREN_AT_HOME",0);
  KJE.parameters.set("YEARS_UNTIL_START_SOCIAL_SECURITY_SURVIVOR_BENEFITS_CHILDREN_GONE",10);
  KJE.parameters.set("YEARS_UNTIL_START_SPOUSE_INCOME_FROM_WORK",0);
  KJE.parameters.set("CHECK_BOX_HIDE",true);
  
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


