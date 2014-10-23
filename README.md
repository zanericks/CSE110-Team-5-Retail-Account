CSE110-Team-5-Retail-Account
============================


CSE 110 User Stories
PS. Everybody please fill out the template for your role: https://sites.google.com/site/cse110fall2014/project/roles

Team Name: Raed is Tester (Raddest Tester)

Team Members:
Brian Fong - Project Manager
Queena Liu (Shu Liu) - Business Analyst
Max Howard - Architect
Theodore Shih - Architect
Zane Ricks - Developer
SeungEun Narm - Developer
Luyao Zhou - Tester
Raed Wehbe - Tester


1. Title: Create An Account
Description: As a customer of the bank, I want to create an online banking account to be able to manage my account through the internet.
Acceptance Criteria: Username is not already used by another user. Password has a minimum length of 8, and contains at least one upper-case character, lower case character, number, and symbol. The personal information provided by the customer should be unique (social security number check) to make sure no two online banking accounts are made for the same customer. When creating an account, it requires an email address so alerts can be sent to email (such as low balance).

(1, 2, 4, or 8 hours)
ESTIMATED TIME (in hours): 2, 4, 8, 4
Priority(out of 100): 90, 95, 100, 100


2. Title: Securely login to your account
Description: As a customer of the bank, I want to login to my account safely to prevent my personal banking information from being stolen.
Acceptance Criteria: Make sure that the information provided at login matches the information for that user in the bank’s database. (Encryption of the password/info while transferring data).


ESTIMATED TIME (in hours): 2, 4, 4, 4
Priority(out of 100): 90, 95, 100, 95

3. Title: Check the Balance on all Accounts
Description: As a customer of the bank, I want to see how much money there is in all my accounts to help me manage my spending limits.
Acceptance Criteria: Retrieve the balance for the right customer and display the correct amount. Display the transaction history for the last three months. 


ESTIMATED TIME (in hours): 1, 1, 1, 2
Priority(out of 100): 80, 90, 90, 90

4. Title: Credit the Account
Description: As a customer of the bank, I want to be able to deposit money into the account to safely hold my money.
Acceptance Criteria: When I go to the bank to deposit my money, the online banking system updates my account balance after the deposit.


ESTIMATED TIME (in hours): 1, 1, 1, 1
Priority(out of 100): 80, 90, 95, 85

5. Title: Debit the Account
Description: As a customer of the bank, I want to withdraw money from my account to spend my money.
Acceptance Criteria: Prevent transaction when desired withdrawal amount is bigger than account balance or if there is no money in the account. When I go to the bank to withdraw money, the online banking system updates my account balance after the withdrawal.

ESTIMATED TIME (in hours): 1, 2, 4, 2
Priority(out of 100): 80, 90, 80, 85

6. Title: Transfer Money from One Account to Another
Description: As a customer of the bank, I want to be able to transfer money from one account to another to help me better manage the money in my accounts. As a customer of the bank, I want to transfer money from my account to another person’s account in the same bank.
Acceptance Criteria: Alert when the account withdrawn from has a balance lower than the transfer amount or if there is no money in the account. The accounts must be from the same bank. Prevent transfer if the customer attempts to transfer money from/to other banks(account number not found in our own database) or with an invalid account number input (ie. negative numbers).

ESTIMATED TIME (in hours): 4, 4, 8, 4
Priority(out of 100): 50, 70, 80, 85

7. Title: Close An Account
Description: As a customer of the bank, I want to be able to close an existing account and stop all future transactions with that account to make sure nothing happens to my account if I don’t want to use it any more.
Acceptance Criteria: Close desired account (like freezing an account). If the customer wants to reopen this account, he/she must go to the bank and talk to a banker. No transactions or transfers can include this account if it is closed. 

ESTIMATED TIME (in hours): 2, 1, 2, 1
Priority(out of 100): 30, 30, 20, 30

8. Title: If the balance on your account is below $100 for over 30 days, a penalty of 25% if deducted from your balance
Description: As a customer of the bank, I wanted to be notified by email (or text message, depending on customer preference) two days before the 30 days limit if my balance is under $100 to make sure I am aware of the penalty.
Acceptance Criteria: An alert system to tell customers when their balance in a certain account is under $100. If they do not put money in the account, they will get a penalty. Make sure that the account balance reflects the new change. Also the penalty should be listed in the transaction history.

ESTIMATED TIME (in hours): 4, 4, 4, 2
Priority(out of 100): 30, 20, 15, 20

9. Title: If your balance is over $3000 for over 30 days, an interest of 3% is applied to your account, over $2000 and below $3000, 2%, over $1000 and below $2000, 1% interest will be accrued
Description: As a customer of the bank, I want to be notified if my balance has been over $3000 for over 30 days, and an interest of 3% has been applied to my account to make sure I know that my balance has changed.
Acceptance Criteria: Make sure that the account is at least $3000 (or $2000-$2999 or $1000-$1999) and that it has been that way for over 30 days. At this point, an alert is to be sent to the customer notifying him/her that interest has been applied. Make sure that the dollar amount of interest reflects the dollar amount in the account. Make sure that the account balance reflects the new change. Make sure that the account balance reflects the correct account (Checking or Saving). Make sure the interest reflects in the transaction history.

ESTIMATED TIME (in hours): 4, 2, 8, 2
Priority(out of 100): 40, 50, 60, 40

10. Title: Any user can have multiple accounts
Description: As a customer of the bank, I want to be able to create multiple Checking or Saving accounts with the same account information to be able to use different accounts for different purposes.
Acceptance Criteria: Online banking should display all the accounts that a customer owns and let the customer switch between accounts. Should let the customer transfer money between two of the same types of accounts (eg. two Checking accounts or two Savings accounts), as long as it fits requirements of user story 6.

ESTIMATED TIME (in hours): 2, 2, 8, 8
Priority(out of 100): 60, 65, 50, 60

