public class Moderator extends Visitor{

	public String id;
	private String password;
	private String accountNumber;

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
	
	@Override
	public void viewApp() {
		// show all apps
	}
	
}