
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;

public class Moderator extends Visitor {

	public String id;
	private String password;
	private String accountNumber;
	public Application application;

	Moderator() {
		this.id = "2";
		this.password = "Moderator";
		this.accountNumber = "2";
		application = Admin.getApplicationForUse();
	}

	Moderator(String id, String password) {
		this.id = id;
		this.password = password;
		this.accountNumber = id;
		application = Admin.getApplicationForUse();
	}

	Moderator(String id, String password, String accountNumber) {
		this.id = id;
		this.password = password;
		this.accountNumber = accountNumber;
		application = Admin.getApplicationForUse();
	}

	private boolean isLoginSuccess() throws Exception {
		FileReader fr = new FileReader("login.txt");

		Map address = new HashMap();
		// need to store the login.txt in the address.

		// iterating address Map
		Iterator<Map.Entry> itr1 = address.entrySet().iterator();
		while (itr1.hasNext()) {
			Map.Entry pair = itr1.next();
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
		}
		return true;
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

	public boolean removeComment(String comment) throws Exception {
		// if Logged in
		if (isLoginSuccess()) {
			application.removeComment(comment);
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
