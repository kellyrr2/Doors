
import java.io.FileReader;
import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;

public class User extends Visitor {

	public String id;
	private String password;
	private String accountNumber;
	public Application application;

	User() {
		this.id = "101";
		this.password = "User1";
		this.accountNumber = "101";
		application = Admin.getApplicationForUse();
	}

	User(String id, String password) {
		this.id = id;
		this.password = password;
		this.accountNumber = id;
		application = Admin.getApplicationForUse();
	}

	User(String id, String password, String accountNumber) {
		this.id = id;
		this.password = password;
		this.accountNumber = accountNumber;
		application = Admin.getApplicationForUse();
	}

	private boolean isLoginSuccess() throws Exception {

		Map address = new HashMap();
		Iterator<Map.Entry> itr1 = address.entrySet().iterator();
		boolean match = false;
		int matches = 0;

		while (itr1.hasNext()) {

			Map.Entry pair = itr1.next();
			System.out.println(pair.getKey() + " : " + pair.getValue());
			if (match) {
				if (pair.getKey().equals("id")) {
					if (!pair.getValue().toString().equals(id)) // incorrect id
					{
						return false;
					}
				}
				if (pair.getKey().equals("accountNumber")) {
					if (!pair.getValue().toString().equals(accountNumber)) // incorrect accountNumber
					{
						return false;
					}
				}
				if (pair.getKey().equals("password")) {
					if (!pair.getValue().toString().equals(password)) // incorrect password
					{
						return false;
					}
				}
				matches++;
			} else {
				if (pair.getKey().equals("id")) {
					if (pair.getValue().toString().equals(id)) // incorrect id
					{
						match = true;
						matches++;
					}
				}
				if (pair.getKey().equals("accountNumber")) {
					if (pair.getValue().toString().equals(accountNumber)) // incorrect accountNumber
					{
						match = true;
						matches++;
					}
				}
				if (pair.getKey().equals("password")) {
					if (pair.getValue().toString().equals(password)) // incorrect password
					{
						match = true;
						matches++;
					}
				}
			}
		}
		if (match) {
			if (matches == 3) {
				return true;
			} else {
				return false;
			}
		}

		return false; // user not found
	}

	public boolean comment(String comment) throws Exception {
		// if Logged in
		if (isLoginSuccess()) {
			application.addComment(comment);
			return true;
		} else {
			return false;
		}
	}

	@Override
	public void viewApp() {
		// show all apps
	}

}
