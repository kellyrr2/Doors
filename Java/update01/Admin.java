
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;

public class Admin extends Visitor {

	public String id;
	private String password;
	private String accountNumber;
	public Application application;

	Admin() {
		this.id = "101";
		this.password = "User1";
		this.accountNumber = "1";
		application = new Application("App2", "App To Test", "James", "iOS", "1.1", "www.xyz.com", 20);
	}

	private boolean isLoginSuccess() throws Exception {
		FileReader fr = new FileReader("login.txt");
                
		Map address = new HashMap();
                // need to store the login.txt on the address
		
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

	public boolean addApplication(Application app) throws Exception {
		// if Logged in
		if (isLoginSuccess()) {
			RequestPage page = new RequestPage();
			page.setApplication(app);
			return true;
		} else {
			return false;
		}
	}

	public static Application getApplicationForUse() {
		return new Application("App1", "App To Test", "James", "iOS", "1.1", "www.abc.com", 100);
	}

	@Override
	public void viewApp() {
		// show all apps
	}

}
