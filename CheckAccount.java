import java.util.Calendar;

/*
 *Public class that extends the functionality of Account class for checking
 *accounts.
 */
public class CheckAccount extends Account
{
  private int debitNum;             //Debit card number
  private static int numDebits = 0; //Total number of debit numbers
  
  //Protected Constructor. Constructs class with default settings
  protected CheckAccount()
  {
    accountNumber = numAccounts;
    numAccounts++;
    debitNum = numDebits;
    numDebits++;
    accountName = "My Checking Account";
    balance = 0;
    dateCreated = Calendar.getInstance();
    lastTransaction = Calendar.getInstance();
  }
}