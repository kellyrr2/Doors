public class RequestPage {

	public Application application;

	public Application setApplication(String name, String description, String developers, String platform,
			String version, String link, double price) {
		application = new Application(name, description, developers, platform, version, link, price);
		return application;
	}

	// implementation
	public Application setApplication(Application app) {
		application = setApplication(app.getName(), app.getDescription(), app.getDevelopers(), app.getPlatform(), 
				app.getVersion(), app.getLink(), app.getPrice());
		return application;
	}
}
