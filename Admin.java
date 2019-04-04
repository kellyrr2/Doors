import java.util.ArrayList;

public class Admin extends Visitor{
	public String id;
	private String password;
	private String accountNumber;
	
	ArrayList<String> validIds;

	private boolean isLoginSuccess() { // for example for user
		if (validIds.contains(id)) {
			// check for password
			// if correct
			return true;
			// else return false;
		}
		return false;
	}

	public boolean comment(String comment) {
		// if Logged in
		// select app
		// application.addComment(comment);
		return true;
		// else
		// return false;
	}

	public boolean removeComment(String comment) {
		// if Logged in
		// select app
		// application.removeComment(comment);
		return true;
		// else
		// return false;
	}

	public boolean addApplication(Application app) {
		// if Logged in
		RequestPage page = new RequestPage();
		page.setApplication(app);
		return true;
		// else
		// return false;
	}
	
	@Override
	public void viewApp() {
		// show all apps
	}
	
}