public class User extends Visitor{
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

//	public boolean addApplication(String name, String description, String developers, String platform, String version,
//			String link, double price) {
//		Application app = new Application(name, description, developers, platform, version, link, price);
//		Admin admin = new Admin(); // this needs to be modified as per the way we need to call them
//		return admin.addApplication(app);
//	}
	
	@Override
	public void viewApp() {
		// show all apps
	}
	
}
