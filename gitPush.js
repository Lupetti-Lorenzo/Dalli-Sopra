//esempio: npm run gitpush -- commit the commit

const { exec } = require("child_process");

let args = process.argv;
args.splice(0, 2); //eliminate first 2,

const message = args.join(" ");

exec("git add .", add); //add executed after exec returned, callback

//callbacks
function add(err) {
	if (err) {
		console.log(err);
		return;
	}
	//worked
	exec(`git commit -m "${message}"`, commit);
}

function commit(err) {
	if (err) {
		console.log(err);
		return;
	}
	//worked
	exec(`git push origin master`, push);
}

function push(err) {
	if (err) {
		console.log(err);
		return;
	}
	//worked
	console.log("Code successfully pushed to master");
}
