import java.util.LinkedList;
import java.util.List;
import java.util.Queue;

public final class SyncLastTransmission {
	private Queue<String> transmission = new LinkedList<String>();
	private boolean read = false;
	private boolean hasData = false;
	
	public void addData(String data) {
		this.transmission.add(data);
	}
	
	public boolean hasData() {
		if(this.transmission.size() > 0) {
			return true;
		}
		return false;
	}
	
	public String peekData() {
		return transmission.peek();
	}
	
	public String pollData() {
		return transmission.poll();
	}
}
