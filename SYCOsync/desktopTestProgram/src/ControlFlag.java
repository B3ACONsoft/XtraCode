
public final class ControlFlag {
	private boolean running;
	
	public void go() {
		this.running = true;
	}
	
	public void stop() {
		this.running = false;
	}
}
