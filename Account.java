import java.util.Calendar;
import java.util.GregorianCalendar;

/*
 *Parent account class. Contains common account variables and methods.
 */
public class Account
{
  protected int accountNumber;          //Account number unique to that account
  protected int balance;                //Current balance of account, cannot be below zero
  protected static int numAccounts = 0; //Number of created accounts, used for account number
  protected String accountName = new String();                    //Name of the Account 
  protected Calendar lastTransaction = new GregorianCalendar();   //Date of last account transaction
  protected Calendar dateCreated = new GregorianCalendar();       //Date account was created
  
  //Creates a default account type. All fields initialized to defaults
  protected Account()
  {
    accountNumber = numAccounts;
    numAccounts++;
    balance = 0;
    accountName = "My Account";
    dateCreated = Calendar.getInstance();
    lastTransaction = Calendar.getInstance();
  }
  
  /*
   *Deposit Money method. Takes account number and amount to deposit, and increases
   *specified account balance by deposit amount. Returns true if deposit successful,
   *else false.
   *STUB
   */
  protected boolean deposit( int depositAccNum, int depositAmount)
  {
    return true;
  }
  
  /*
   *Withdraw money method. Takes account number and amount to withdraw, and subtracts
   *specified amount from selected account balance. Returns true if withdrawal
   *successful, else false.
   *STUB
   */
  protected boolean withdrawal( int withdrawalAccNum, int withdrawalAmount)
  {
    return true;
  }
  
  /*
   *Transfer money method. Transfers money between the two specified accounts
   *for the amount specified. Returns true if transfer successful, else false.
   *STUB
   */
  protected boolean transfer( int fromAccNum, int toAccNum, int transAmount)
  {
    return true;
  }
}