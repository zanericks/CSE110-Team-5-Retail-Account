import java.util.Calendar;

/*
 *Public class that extends the functionality of the Account class to allow
 *savings accounts.
 */
public class SavingAccount extends Account
{
  private int numTransactions;      //Number of transactions performed by account
  
  /*
   *Protected constructor. Creates a savings account with all fields set to defaults
   */
  protected SavingAccount()
  {
    accountNumber = numAccounts;
    numAccounts++;
    accountName = "My Savings Account";
    balance = 0;
    numTransactions = 0;
    dateCreated = Calendar.getInstance();
    lastTransaction = Calendar.getInstance();
  }
}